@extends('layouts.app', ['title' => 'Class Scheduling'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-12 col-lg-5 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">
                  {{ $sclass->getCourse() }}
                </h2>
                <p class="text-muted text-sm">{{ $degree }}</p>

                <hr class="my-4" />

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
                      @role('admin')
                      <a href="/faculties/{{ $sclass->instructor->user->id }}">
                        {{ $sclass->instructor->user->getNameWithTitle() }}
                      </a>
                      @else
                        {{ $sclass->instructor->user->getNameWithTitle() }}
                      @endrole
                    </dd>
                    @if($sclass->section != null)
                    <dt class="col-sm-5">
                        Section:
                    </dt>
                    <dd class="col-sm-7">
                        {{ $sclass->section }}
                    </dd>
                    @endif
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

                <hr class="my-4" />

                <div class="row">
                  <div class="col">
                    <a href="/classes" class="btn btn-outline-secondary btn-sm">
                      Return
                    </a>
                    @role('admin|head registrar')
                    <a href="/classes/{{ $sclass->class_id }}/edit" class="btn btn-outline-info btn-sm">
                      Edit Class
                    </a>

                    <form action="{{ action('SClassController@destroy', $sclass->class_id) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirm('Are you sure you want to dissolve the {{ $sclass->getCourse() }} class?') ? this.parentElement.submit() : ''">
                            Dissolve Class
                        </button>
                    </form>
                    @endrole
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-7 mb-5 mb-xl-0">
          <div class="card shadow">
          @if(count($grades) > 0 || $search != null)
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Students Enrolled</h3>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8 col-md-6">
                        <form action="/classes/{{ $sclass->class_id }}?" method="get" class="form-horizontal">
                          <div class="form-group mb-0">
                            <div class="input-group input-group-sm pt-0">
                              <input name="search" class="form-control" placeholder="e.g. 041830914 or Juan" type="text">
                              <div class="input-group-append">
                                <button class="btn btn-outline-default" type="submit">Search</button>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                    @if($search != null)
                    <div class="col">
                        <a href="/classes/{{ $sclass->class_id }}" class="btn btn-outline-secondary btn-sm">
                            {{ str_limit($search, 10) }}
                            <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                        </a>
                    </div>
                    @endif

                    @role('admin|head registrar')
                    <div class="col text-right">
                      <a href="/classes/enroll_students/{{ $sclass->class_id}}" class="btn btn-sm btn-primary">
                          Enroll Student
                        </a>
                    </div>
                    @endrole
                </div>
            </div>

            @if($search != null && count($grades) == 0)
              <div class="row mt-3 mb-5">
                <div class="col text-center">
                    <p class="lead">Student not found</p>
                </div>
              </div>
            @endif

            @if(count($grades) > 0)
              <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                          <tr>
                              <th scope="col">Student</th>
                              <th scope="col" class="text-center">Credited Course</th>
                              <th scope="col"></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($grades as $grade)
                          <tr>
                              <td scope="row">
                                @role('head registrar')
                                  {{ $grade->student->getStudentNo() }}
                                @else
                                  <a href="/students/{{ $grade->student->user->id }}">
                                    {{ $grade->student->getStudentNo() }}
                                  </a>
                                @endrole
                                {{ $grade->student->user->getName() }}
                              </td>
                              <td class="text-center">
                                @role('head registrar')
                                  {{ $grade->curriculumDetails->curriculum_id }} {{ $grade->curriculumDetails->course->course_code}}
                                @else
                                  <a href="/curriculums/{{ $grade->curriculumDetails->curriculum_id }}">
                                    {{ $grade->curriculumDetails->curriculum_id }} {{ $grade->curriculumDetails->course->course_code}}
                                  </a>
                                @endrole
                              </td>
                              <td class="text-right">
                              @if($grade->grade != null)
                                <span class="badge badge-primary">{{ $grade->getGrade() }}</span>
                              @else
                                <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="/classes/{{ $sclass->class_id }}/drop/{{ $grade->grade_id }}" class="dropdown-item" onclick="return confirm('Are you sure you want to drop {{ $grade->student->user->getName() }} in {{ $sclass->course_code }} class?')">
                                        Drop
                                    </a>

                                    <form action="{{ action('GradeController@destroy', $grade->grade_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to remove {{ $grade->student->user->getName() }} in {{ $sclass->course_code }} class?') ? this.parentElement.submit() : ''">
                                            Remove
                                        </button>
                                    </form>
                                  </div>
                                </div>
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
            @endif
          @else
            <div class="row mt-3 mb-5">
                <div class="col text-center">
                    <p class="lead">No Enrolled Students</p>
                    <br>
                    @role('admin|head registrar')
                    <div class="col">
                      <a href="/classes/enroll_students/{{ $sclass->class_id}}" class="btn btn-lg btn-primary">
                          Enroll Student
                        </a>
                    </div>
                    @endrole
                </div>
            </div>
          @endif
          </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection