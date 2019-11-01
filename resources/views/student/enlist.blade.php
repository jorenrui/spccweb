@extends('layouts.app', ['title' => 'Students'])

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

    @if(count($classes) > 0)
      <div class="row mt-3">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">

              <div class="card-header border-0">
                <div class="row">
                  <div class="col col-md-8">
                    <h3 class="mb-0">Course Enlistment | {{ $user->student->getStudentNo() }} {{ $user->getName()}}</h3>
                  </div>
                  <div class="col text-right">
                      <a href="/students/{{ $user->id }}/enlistment" class="btn btn-sm btn-outline-secondary">Return</a>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                          <tr>
                              <th scope="col"></th>
                              <th scope="col" class="text-center">Credited Curriculum</th>
                              <th scope="col" class="text-center">Course Code</th>
                              <th scope="col">Description</th>
                              <th scope="col" class="text-center">Schedule</th>
                              <th scope="col" class="text-center">Room</th>
                              <th scope="col" class="text-center">Instructor</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($classes as $sclass)
                        <form id="form-post" method="POST" action="{{ action('StudentController@enlistClass', [$user->id, $sclass->class_id]) }}">
                          @csrf
                          <tr>
                              <td class="text-center" scope="row">
                                @if($sclass->isClassEnlisted($user->student))
                                  <button class="btn btn-sm" disabled>
                                    Enlisted
                                  </button>
                                @else
                                  <input id="student_no" name="student_no" type="text" value="{{ $user->student->student_no }}" style="display:none;" required>
                                  <input id="class_id" name="class_id" type="text" value="{{ $sclass->class_id }}" style="display:none;" required>

                                  <button type="submit" class="btn btn-outline-primary btn-sm">
                                    Enlist
                                  </button>
                                @endif
                              </td>
                              <td>
                                <select name="curriculum_details_id" class="select2 form-control m-b" style="
                                width: 350px;" required>
                                  @foreach ($user->student->curriculum->curriculumDetails as $curriculum_details)
                                  <!-- Set course in curriculum to selected if the same with course in class -->
                                  @if($sclass->course_code == $curriculum_details->course_code)
                                    <option value="{{ $curriculum_details->curriculum_details_id }}" selected>
                                      {{ $curriculum_details->course->getCourse() }}
                                    </option>
                                  @else
                                    <option value="{{ $curriculum_details->curriculum_details_id }}">
                                      {{ $curriculum_details->course->getCourse() }}
                                    </option>
                                  @endif
                                  @endforeach
                                </select>
                              </td>
                              <td class="text-center">
                                {{ $sclass->course_code }}
                              </td>
                              <td>{{ $sclass->course->description }}</td>
                              <td class="text-center">{{ $sclass->getSchedule() }}</td>
                              <td class="text-center">{{ $sclass->course->room }}</td>
                              <td class="text-center">{{ $sclass->instructor->user->getNameWithTitle() }}</td>
                          </tr>
                        </form>
                        @endforeach
                      </tbody>
                  </table>
              </div>

              <div class="card-footer">
                  {{ $classes->links() }}
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
                      <p class="lead">No Class found</p>
                      <br>
                      <a href="/classes/create" class="btn btn-primary btn-lg">Add Class</a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    @endif

      @include('layouts.footers.auth')
    </div>
@endsection