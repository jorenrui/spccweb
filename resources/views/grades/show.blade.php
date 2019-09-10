@extends('layouts.app', ['title' => 'Grade Report'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">
                  {{ $sclass->course_code }} | {{ $sclass->course->description }}
                </h2>
                <p class="text-muted text-sm">{{ $degree }}</p>

                <div class="row">
                  <div class="col">
                    <a href="/grades" class="btn btn-outline-secondary btn-sm">
                      Return
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-class-info-tab" data-toggle="tab" href="#tabs-class-info" role="tab" aria-controls="tabs-class-info" aria-selected="false"><i class="ni ni-cloud-upload-96 mr-2"></i>Class Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-grades-tab" data-toggle="tab" href="#tabs-grades" role="tab" aria-controls="tabs-grades" aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Students' Grades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-som-tab" data-toggle="tab" href="#tabs-som" role="tab" aria-controls="tabs-som" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Summary of Grades</a>
                </li>
            </ul>
          </div>
          <div class="card shadow">
              <div class="card-body">
                  <div class="tab-content" id="gradesTab">

                      <!-- Class Information Tab -->
                      <div class="tab-pane fade" id="tabs-class-info" role="tabpanel" aria-labelledby="tabs-class-info-tab">
                        <dl class="row text-sm">
                          <dt class="col-sm-5">
                              Academic Term:
                          </dt>
                          <dd class="col-sm-7">
                              {{ $sclass->acadTerm->getAcadTerm() }}
                          </dd>
                          <dt class="col-sm-5">
                              Instructor:
                          </dt>
                          <dd class="col-sm-7">
                              {{ $sclass->instructor->user->getNameWithTitle() }}
                          </dd>
                          <dt class="col-sm-5">
                              Credits:
                          </dt>
                          <dd class="col-sm-7">
                              {{ $sclass->course->getCredits() }}
                          </dd>
                          <dt class="col-sm-5">
                              Schedule (Lec):
                          </dt>
                          <dd class="col-sm-7">
                              {{ $sclass->getLecSchedule() }}
                          </dd>
                          @if($sclass->course->lab_units > 0)
                          <dt class="col-sm-5">
                              Schedule (Lab):
                          </dt>
                          <dd class="col-sm-7">
                              {{ $sclass->getLabSchedule() }}
                          </dd>
                          @endif
                        </dl>
                        @role('admin')

                        <hr class="my-4" />

                        <h3>Alteration of Grades</h3>
                        <p class="description">
                          Alteration of grades should only be done in case of emergency where the faculty is unable to alter the submitted grades. In these cases, the OIC or Admin may alter it.
                        </p>

                        <a href="#" class="btn btn-outline-warning btn-md">
                            Alter Grades
                        </a>

                        @endrole
                        <hr class="my-4" />

                        <h3>Locking of Grades</h3>
                        <p class="description">
                          Locking of grades should be done upon the approval of the OIC in which he/she can unlock the grades temporarily for the faculty. By default, the succeeding period's grades are locked unless the current period's grades has been encoded. In short, if the prelims grades haven't been encoded yet, grades for midterms and finals are temporarily locked.
                        </p>

                        <div class="row mt-3">
                          <div class="col-3 col-md-2">
                            <div class="form-control-label mb-3">
                                All Grades
                            </div>
                            <label class="custom-toggle">
                              <input type="checkbox">
                              <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                          </div>

                          <div class="col-3 col-md-2">
                            <div class="form-control-label mb-3">
                                Prelims Grade
                            </div>
                            <label class="custom-toggle">
                              <input type="checkbox">
                              <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                          </div>

                          <div class="col-3 col-md-2">
                            <div class="form-control-label mb-3">
                                Midterms Grade
                            </div>
                            <label class="custom-toggle">
                              <input type="checkbox" checked disabled>
                              <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                          </div>

                          <div class="col-3 col-md-2">
                            <div class="form-control-label mb-3">
                                Finals Grade
                            </div>
                            <label class="custom-toggle">
                              <input type="checkbox" checked disabled>
                              <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                          </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-lg-12">
                              <button type="submit" class="btn btn-outline-warning">
                                <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                <span class="btn-inner--text">Save Changes</span>
                              </button>
                            </div>
                        </div>

                      </div>
                      <!-- end Class Information Tab -->

                      <!-- Students' Grades Tab -->
                      <div class="tab-pane fade show active" id="tabs-grades" role="tabpanel" aria-labelledby="tabs-grades-tab">
                        <div class="table-responsive row">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center">Student No.</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Prelims</th>
                                        <th scope="col" class="text-center">Midterms</th>
                                        <th scope="col" class="text-center">Finals</th>
                                        <th scope="col" class="text-center">Average</th>
                                        <th scope="col" class="text-center">Grade</th>
                                        <th scope="col" class="text-center">Re-exam</th>
                                        <th scope="col" class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($grades as $grade)
                                    <tr>
                                        <td class="text-center" scope="row">
                                          {{ $grade->student->student_no }}
                                        </td>
                                        <td>
                                          {{ $grade->student->user->last_name }},
                                          {{ $grade->student->user->first_name[0] }}.
                                        </td>
                                        <td class="text-center">{{ $grade->prelims }}</td>
                                        <td class="text-center">{{ $grade->midterms }}</td>
                                        <td class="text-center">{{ $grade->finals }}</td>
                                        <td class="text-center">{{ $grade->average }}</td>
                                        <td class="text-center">
                                          {{ $grade->getGrade() }}
                                        </td>
                                        <td class="text-center">{{ $grade->re_exam }}</td>
                                        <td class="text-center">
                                        @if($grade->remarks == 'PASSED')
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i> {{ $grade->remarks}}
                                          </span>
                                        @elseif($grade->remarks == 'FAILED')
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-danger"></i> {{ $grade->remarks}}
                                          </span>
                                        @else
                                          -
                                        @endif
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-4">
                          <div class="col-12">
                              {{ $grades->links() }}
                          </div>
                        </div>
                      </div>
                      <!-- end Students' Grades Tab -->

                      <!-- Summary of Grades Tab -->
                      <div class="tab-pane fade" id="tabs-som" role="tabpanel" aria-labelledby="tabs-som-tab">
                          <dl class="row text-sm">
                            <dt class="col-4 col-lg-2">
                                Prelims Grades
                            </dt>
                            <dd class="col-8 col-lg-10">
                              @role('admin|faculty')
                              <a href="#" class="btn btn-outline-secondary btn-sm">
                                Upload
                              </a>
                              @endrole
                              <a href="#" class="btn btn-outline-primary btn-sm">
                                Download
                              </a>
                              <a href="#" class="btn btn-outline-info btn-sm">
                                Print
                              </a>
                            </dd>

                            <dt class="col-4 col-lg-2">
                                Midterms Grades
                            </dt>
                            <dd class="col-8 col-lg-10">
                              @role('admin|faculty')
                              <a href="#" class="btn btn-outline-secondary btn-sm">
                                Upload
                              </a>
                              @endrole
                              <a href="#" class="btn btn-outline-primary btn-sm">
                                Download
                              </a>
                              <a href="#" class="btn btn-outline-info btn-sm">
                                Print
                              </a>
                            </dd>

                            <dt class="col-4 col-lg-2">
                                Finals Grades
                            </dt>
                            <dd class="col-8 col-lg-10">
                              @role('admin|faculty')
                              <a href="#" class="btn btn-outline-secondary btn-sm">
                                Upload
                              </a>
                              @endrole
                              <a href="#" class="btn btn-outline-primary btn-sm">
                                Download
                              </a>
                              <a href="#" class="btn btn-outline-info btn-sm">
                                Print
                              </a>
                            </dd>

                            <dt class="col-4 col-lg-2">
                                Average Grades
                            </dt>
                            <dd class="col-8 col-lg-10">
                              @role('admin|faculty')
                              <a href="#" class="btn btn-outline-secondary btn-sm">
                                Upload
                              </a>
                              @endrole
                              <a href="#" class="btn btn-outline-primary btn-sm">
                                Download
                              </a>
                              <a href="#" class="btn btn-outline-info btn-sm">
                                Print
                              </a>
                            </dd>
                          </dl>
                      </div>
                      <!-- end Summary of Grades Tab -->
                  </div>
              </div>
          </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection