@extends('layouts.app', ['title' => 'Students'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">
                  Credited Courses | {{ $user->student->student_no }} {{ $user->getName() }}
                </h2>
                <p class="text-muted text-sm">{{ $degree }}</p>
                <p>
                  School: {{ $school->school }}
                  <br>
                  Total Units: {{ $school->getTotalUnits() }}
                </p>

                <div class="row">
                  <div class="col">
                    <a href="/students/{{ $user->id }}/credited_courses" class="btn btn-outline-secondary btn-sm">
                      Return
                    </a>

                    @role('admin')
                    <a href="/students/{{ $user->id }}/credited_courses/{{ $school->credit_id }}/edit" class="btn btn-outline-info btn-sm">
                      Edit School
                    </a>

                    <form method="POST" action="{{ action('CreditedCoursesController@destroy', [$user->id, $school->credit_id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete Course Creditation</button>
                    </form>
                    @endrole
                  </div>

                  @role('admin')
                  <div class="col text-right">
                      <a href="/students/{{ $user->id }}/{{ $school->credit_id }}/credit_course/create" class="btn btn-sm btn-primary">
                        Credit Course
                      </a>
                  </div>
                  @endrole
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    @if(count($courses) > 0)
      <!-- Curriculum Details per Academic Term -->
      @foreach ($courses->groupBy('acad_term_id') as $credit_courses)
        <div class="row mt-3">
          <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

                <div class="card-header border-0">
                  <h3 class="mb-0">{{ $credit_courses[0]->acadTerm->getAcadTerm() }}</h3>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Credited Curriculum</th>
                                <th scope="col" class="text-center">Course Code</th>
                                <th scope="col" class="text-left">Course Title</th>
                                <th scope="col" class="text-center">Credits</th>
                                <th scope="col" class="text-center">Grade</th>
                                <th scope="col" class="text-center">COMP.</th>
                                @role('admin')
                                <th scope="col" class="text-right"></th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                          <!-- Curriculum Details per School Year -->
                          @foreach ($credit_courses as $credit_course)
                            <tr>
                                <td class="text-center" scope="row">
                                <a href="/curriculums/{{ $credit_course->curriculumDetails->curriculum_id }}">
                                  {{ $credit_course->curriculumDetails->curriculum_id }}
                                  {{ $credit_course->curriculumDetails->course_code }}
                                </a>
                                </td>
                                <td class="text-center">
                                  {{ $credit_course->course_code }}
                                </td>
                                <td class="text-left">{{ $credit_course->description }}</td>
                                <td class="text-center">
                                  {{ $credit_course->curriculumDetails->course->units }}
                                </td>
                                <td class="text-center">
                                  @if($credit_course->is_inc)
                                    INC
                                  @else
                                    {{ $credit_course->grade }}
                                  @endif
                                </td>
                                <td class="text-center">
                                  @if($credit_course->is_inc)
                                    {{ $credit_course->grade }}
                                  @endif
                                </td>
                                @role('admin')
                                <td class="text-right">
                                  <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                      <a href="/students/{{ $user->id }}/{{ $school->credit_id }}/credit_course/{{ $credit_course->credit_details_id }}/edit" class="dropdown-item"">
                                          Edit
                                      </a>

                                      <form method="POST" action="{{ action('CreditedCoursesDetailsController@destroy', [$user->id, $school->credit_id, $credit_course->credit_details_id]) }}" style="display: inline;">
                                          @csrf
                                          @method('DELETE')

                                          <button type="submit"  class="dropdown-item">Delete</button>
                                      </form>
                                    </div>
                                  </div>
                                </td>
                                @endrole
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
          </div>
        </div>
      @endforeach
    @else
      <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-body row mt-3 mb-5">
                  <div class="col text-center">
                      <p class="lead">Credited Courses is empty</p>
                      <br>
                      <a href="/students/{{ $user->id }}/{{ $school->credit_id }}/credit_course/create" class="btn btn-primary btn-lg">
                        Credit Course
                      </a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    @endif

      @include('layouts.footers.auth')
    </div>
@endsection