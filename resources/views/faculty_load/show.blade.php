@extends('layouts.app', ['title' => 'Faculty Load'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <!-- Class Information -->
        <div class="col-12 col-md-6 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">
                  {{ $sclass->course_code }} | {{ $sclass->course->description }}
                </h2>
                <p class="text-muted text-sm">{{ $degree }}</p>

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

                <div class="row">
                  <div class="col">
                    <a href="/faculty_load" class="btn btn-outline-secondary btn-sm">
                      Return
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- end Class Information -->

        <!-- Summary of Grades -->
        <div class="col-12 col-md-6 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-body row align-items-center">
                <div class="col">
                    <h3>Summary of Grades</h3>

                    <hr class="my-4" />

                    <dl class="row text-sm">
                      <dt class="col-4">
                          Prelims Grades
                      </dt>
                      <dd class="col-8">
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

                      <dt class="col-4">
                          Midterms Grades
                      </dt>
                      <dd class="col-8">
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

                      <dt class="col-4">
                          Finals Grades
                      </dt>
                      <dd class="col-8">
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

                      <dt class="col-4">
                          Average Grades
                      </dt>
                      <dd class="col-8">
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
                </div>
            </div>
        </div>
        <!-- end Summary of Grades -->
      </div>

      <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
              @if(count($grades) > 0)
                <div class="card-header border-0">
                  <div class="row align-items-center">
                      <div class="col">
                          <h3 class="mb-0">Students' Grades</h3>
                      </div>
                      @if($sclass->acad_term_id >= $cur_acad_term)
                      <div class="col text-right">
                        <a href="/faculty_load/encode_grades/{{ $sclass->class_id }}" class="btn btn-sm btn-primary">Encode Grades</a>
                      </div>
                      @endif
                  </div>
                </div>
                <div class="table-responsive">
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
                <div class="card-footer">
                    {{ $grades->links() }}
                </div>
              @else
                  <div class="row border-1 mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Students found</p>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection