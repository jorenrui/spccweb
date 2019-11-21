@extends('layouts.app', ['title' => 'View Faculty Load'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <!-- Class Information -->
        <div class="col-12 col-md-5 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">
                  {{ $sclass->getCourse() }}
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
                  @if($sclass->room != null)
                  <dt class="col-sm-5">
                      Room:
                  </dt>
                  <dd class="col-sm-7">
                      {{ $sclass->room }}
                  </dd>
                  @endif
                </dl>

                <div class="row">
                  <div class="col">
                    @role('faculty')
                      <a href="/faculty/load" class="btn btn-outline-primary btn-sm">
                        Return
                      </a>
                    @else
                      <a href="/faculties/{{ $sclass->instructor->user->id }}/load" class="btn btn-outline-primary btn-sm">
                        Return
                      </a>
                    @endrole
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- end Class Information -->

        <!-- Summary of Grades -->
        <div class="col-12 col-md-7 mb-5 mb-xl-0">
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
                        <a href="/summary_grades/{{ $sclass->class_id }}/prelims" class="btn btn-outline-secondary btn-sm">
                          Upload
                        </a>
                        @endrole
                        @if($sclass->sog_prelims != null)
                        <a href="/summary_grades/{{ $sclass->class_id }}/prelims/download" class="btn btn-outline-primary btn-sm">
                          Download
                        </a>
                        <a href="/summary_grades/{{ $sclass->class_id }}/prelims/view" class="btn btn-outline-info btn-sm">
                          View & Print
                        </a>
                        @role('admin|faculty')
                        <a href="/summary_grades/{{ $sclass->class_id }}/prelims/remove" class="btn btn-outline-danger btn-sm">
                          Remove
                        </a>
                        @endrole
                        @else
                          <span>N/A</span>
                        @endif
                      </dd>

                      <dt class="col-4 mt-2">
                          Midterms Grades
                      </dt>
                      <dd class="col-8 mt-2">
                        @role('admin|faculty')
                        <a href="/summary_grades/{{ $sclass->class_id }}/midterms" class="btn btn-outline-secondary btn-sm">
                          Upload
                        </a>
                        @endrole
                        @if($sclass->sog_midterms != null)
                        <a href="/summary_grades/{{ $sclass->class_id }}/midterms/download" class="btn btn-outline-primary btn-sm">
                          Download
                        </a>
                        <a href="/summary_grades/{{ $sclass->class_id }}/midterms/view" class="btn btn-outline-info btn-sm">
                          View & Print
                        </a>
                        @role('admin|faculty')
                        <a href="/summary_grades/{{ $sclass->class_id }}/midterms/remove" class="btn btn-outline-danger btn-sm">
                          Remove
                        </a>
                        @endrole
                        @else
                          <span>N/A</span>
                        @endif
                      </dd>

                      <dt class="col-4 mt-2">
                          Finals Grades
                      </dt>
                      <dd class="col-8 mt-2">
                        @role('admin|faculty')
                        <a href="/summary_grades/{{ $sclass->class_id }}/finals" class="btn btn-outline-secondary btn-sm">
                          Upload
                        </a>
                        @endrole
                        @if($sclass->sog_finals != null)
                        <a href="/summary_grades/{{ $sclass->class_id }}/finals/download" class="btn btn-outline-primary btn-sm">
                          Download
                        </a>
                        <a href="/summary_grades/{{ $sclass->class_id }}/finals/view" class="btn btn-outline-info btn-sm">
                          View & Print
                        </a>
                        @role('admin|faculty')
                        <a href="/summary_grades/{{ $sclass->class_id }}/finals/remove" class="btn btn-outline-danger btn-sm">
                          Remove
                        </a>
                        @endrole
                        @else
                          <span>N/A</span>
                        @endif
                      </dd>

                      <dt class="col-4 mt-2">
                          Average Grades
                      </dt>
                      <dd class="col-8 mt-2">
                        @role('admin|faculty')
                        <a href="/summary_grades/{{ $sclass->class_id }}/average" class="btn btn-outline-secondary btn-sm">
                          Upload
                        </a>
                        @endrole
                        @if($sclass->sog_average != null)
                        <a href="/summary_grades/{{ $sclass->class_id }}/average/download" class="btn btn-outline-primary btn-sm">
                          Download
                        </a>
                        <a href="/summary_grades/{{ $sclass->class_id }}/average/view" class="btn btn-outline-info btn-sm">
                          View & Print
                        </a>
                        @role('admin|faculty')
                        <a href="/summary_grades/{{ $sclass->class_id }}/average/remove" class="btn btn-outline-danger btn-sm">
                          Remove
                        </a>
                        @endrole
                        @else
                          <span>N/A</span>
                        @endif
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
                      <div class="col text-right">
                        @role('faculty')
                        <a href="/faculty/load/{{ $sclass->class_id }}/students" class="btn btn-sm btn-outline-primary">View Student Masterlist</a>
                        @endrole
                        @if($sclass->acad_term_id >= $cur_acad_term &&
                            date('Y-m-d') >= $acad_term->prelimsEvent->start_date)
                          @role('faculty|admin')
                            <a href="/faculty/load/{{ $sclass->class_id }}/encode" class="btn btn-sm btn-primary">Encode Grades</a>
                          @else
                            <a href="/faculties/{{ $sclass->instructor->user->id }}/load/{{ $sclass->class_id }}/encode" class="btn btn-sm btn-primary">Encode Grades</a>
                          @endrole
                        @endif
                      </div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                              @if($sclass->acad_term_id == $cur_acad_term)
                                <th scope="col"></th>
                              @endif
                                <th scope="col" class="text-center">Student No.</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Prelims</th>
                                <th scope="col" class="text-center">Midterms</th>
                                <th scope="col" class="text-center">Finals</th>
                                <th scope="col" class="text-center">Average</th>
                                <th scope="col" class="text-center">Grade</th>
                                <th scope="col" class="text-center">Completion</th>
                                <th scope="col" class="text-center">Remarks</th>
                                <th scope="col" class="text-center">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($grades as $grade)
                            <tr>
                              @if($grade->getGrade() == null)
                                <td class="text-right">
                                  @if($sclass->acad_term_id == $cur_acad_term && $grade->grade == null && !$grade->is_inc)
                                  <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                      @if( !$grade->is_inc )
                                        <a href="/faculty/load/unofficial_drop/{{ $grade->grade_id }}" class="dropdown-item" onclick="return confirm('Are you sure you want to unoffically drop {{ $grade->student->user->getName() }} in {{ $sclass->course_code }} class?')">
                                            Unoffically Drop
                                        </a>
                                        <a class="dropdown-item" href="/faculty/load/inc/{{ $grade->grade_id }}" onclick="return confirm('Are you sure you want to set {{ $grade->student->user->getName() }}\'s grade to Incomplete?')">
                                            Set as Incomplete
                                        </a>
                                      @elseif(auth()->user()->hasRole('admin'))
                                        <a class="dropdown-item" href="/faculty/load/completion/{{ $grade->grade_id }}">
                                            Enter Completion Grade
                                        </a>
                                      @endif
                                    </div>
                                  </div>
                                  @endif
                                </td>
                              @else
                                <td></td>
                              @endif
                                <td class="text-center" scope="row">
                                  {{ $grade->student->getStudentNo() }}
                                </td>
                                <td>{{ $grade->student->user->getSortableName() }}</td>
                                <td class="text-center">{{ $grade->prelims }}</td>
                                <td class="text-center">{{ $grade->midterms }}</td>
                                <td class="text-center">{{ $grade->finals }}</td>
                                <td class="text-center">{{ $grade->getAverage() }}</td>
                                <td class="text-center">{{ $grade->getGrade() }}</td>
                                <td class="text-center">{{ $grade->getCompletion() }}</td>
                                <td>
                                @if($grade->getRemarks() == 'PASSED')
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i> {{ $grade->getRemarks() }}
                                  </span>
                                @elseif($grade->getRemarks() == 'FAILED')
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-danger"></i> {{ $grade->getRemarks() }}
                                  </span>
                                @elseif($grade->getRemarks() != null)
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i> {{ $grade->getRemarks() }}
                                  </span>
                                @endif
                                </td>
                                <td class="text-center">
                                  {{ $grade->note }}
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