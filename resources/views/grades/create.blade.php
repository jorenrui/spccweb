@extends('layouts.app', ['title' => 'Class Scheduling'])

@section('styles')
<link href="{{ asset('vendor/select2-4.0.10/select2.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/select2-4.0.10/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.select2').select2();
});
</script>
@endpush

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">
                  {{ $sclass->course_code }} | {{ $sclass->course->description }}
                </h2>

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

                <hr class="my-4" />

                <div class="row">
                  <div class="col">
                    <a href="/classes" class="btn btn-outline-secondary btn-sm">
                      Return
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    @if(count($students) > 0)
          <div class="row mt-3">
            <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">

                  <div class="card-header border-0">
                    <h3 class="mb-0">Enroll Students to {{ $sclass->course_code }}</h3>
                  </div>

                  <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                              <tr>
                                  <th scope="col"></th>
                                  <th scope="col">Credited Curriculum</th>
                                  <th scope="col">Student No.</th>
                                  <th scope="col">Name</th>
                                  <th scope="col" class="text-center">Curriculum ID</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($students as $student)
                            <form id="form-post" method="POST" action="{{ action('GradeController@store') }}">
                              @csrf
                              <tr>
                                  <td class="text-center" scope="row">
                                        <input id="student_no" name="student_no" type="text" value="{{ $student->student->student_no }}" style="display:none;" required>
                                        <input id="class_id" name="class_id" type="text" value="{{ $sclass->class_id }}" style="display:none;" required>

                                        <button type="submit" class="btn btn-outline-primary btn-sm">
                                          Enroll
                                        </button>
                                  </td>
                                  <td>
                                    <select name="curriculum_details_id" class="select2 form-control m-b" required>
                                      @foreach ($student->student->curriculum->curriculumDetails as $curriculum_details)
                                      <!-- Set course in curriculum to selected if the same with course in class -->
                                      @if($sclass->course_code == $curriculum_details->course_code)
                                        <option value="{{ $curriculum_details->curriculum_details_id }}" selected>
                                          {{ $curriculum_details->course_code }} | {{ $curriculum_details->course->description }}
                                        </option>
                                      @else
                                        <option value="{{ $curriculum_details->curriculum_details_id }}">
                                          {{ $curriculum_details->course_code }} | {{ $curriculum_details->course->description }}
                                        </option>
                                      @endif
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>{{ $student->student->student_no }}</td>
                                  <td>{{ $student->getName() }}</td>
                                  <td class="text-center">{{ $student->student->curriculum_id }}</td>
                              </tr>
                            </form>
                            @endforeach
                          </tbody>
                      </table>
                  </div>

                  <div class="card-footer">
                      {{ $students->links() }}
                  </div>
              </div>
            </div>
          </div>
    @else
      <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-body row mt-3 mb-5">
                  <div class="col text-center">
                      <p class="lead">No Students found</p>
                      <br>
                      <a href="/students/create" class="btn btn-primary btn-lg">Add Students</a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    @endif

      @include('layouts.footers.auth')
    </div>
@endsection