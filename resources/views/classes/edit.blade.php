@extends('layouts.app', ['title' => 'Class Scheduling'])

@section('styles')
<link href="{{ asset('vendor/select2-4.0.10/select2.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/select2-4.0.10/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.select2').select2();

  $('.select2-nosearch').select2({
    minimumResultsForSearch: Infinity
  });

  $('#lec_time_start').on('input', function() {
    let time_start = $(this).val();
    let hours = Number(time_start[0] + time_start[1]) + 2;
    let time_end = null;

    if(hours >= 24)
      hours -= 24;

    if(hours < 10)
      time_end = '0' + (hours + time_start.substring(2));
    else
      time_end = hours + time_start.substring(2);

    $('#lec_time_end').val(time_end).change();
  });

  $('#lab_time_start').on('input', function() {
    let time_start = $(this).val();
    let hours = Number(time_start[0] + time_start[1]) + 2;
    let time_end = null;

    if(hours >= 24)
      hours -= 24;

    if(hours < 10)
      time_end = '0' + (hours + time_start.substring(2));
    else
      time_end = hours + time_start.substring(2);

    $('#lab_time_end').val(time_end).change();
  });
});
</script>
@endpush

@section('content')
    @include('layouts.headers.header', ['title' => 'Edit Class'])

    <div class="container-fluid mt--7">
        @include('layouts.headers.messages')

        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Class</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/classes" class="btn btn-sm btn-outline-secondary">
                                    Back to list
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-post" method="POST" action="{{ action('SClassController@update', $sclass->class_id) }}" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="pl-lg-4 row">
                              <div class="col-12 col-lg-4 col-md-6">
                                <label class="form-control-label" for="acad_term_id">Academic Term</label>
                                <select id="acad_term_id" name="acad_term_id" class="select2 form-control{{ $errors->has('acad_term_id') ? ' is-invalid' : '' }} m-b" required>
                                  @foreach ($acad_terms as $acad_term)
                                    @if($sclass->acad_term_id == $acad_term->acad_term_id)
                                      <option value="{{ $acad_term->acad_term_id }}" selected>
                                        {{ $acad_term->getAcadTerm() }}
                                      </option>
                                    @else
                                    <option value="{{ $acad_term->acad_term_id }}">
                                      {{ $acad_term->getAcadTerm() }}
                                    </option>
                                    @endif
                                  @endforeach
                                </select>

                                @if ($errors->has('acad_term_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('acad_term_id') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>

                            <h6 class="heading-small text-muted my-4">
                              Class Information
                            </h6>
                            <div class="pl-lg-4 row">
                              <div class="col-12 col-md-10">
                                <label class="form-control-label" for="course_code">Course</label>
                                <select id="course_code" name="course_code" class="select2 form-control{{ $errors->has('course_code') ? ' is-invalid' : '' }} m-b" required>
                                  @foreach ($courses as $course)
                                    @if($sclass->course_code == $course->course_code)
                                      <option value="{{ $course->course_code }}" selected>
                                        {{ $course->getCourse() }} | {{ $course->getCredits() }}
                                      </option>
                                    @else
                                      <option value="{{ $course->course_code }}">
                                        {{ $course->getCourse() }} | {{ $course->getCredits() }}
                                      </option>
                                    @endif
                                  @endforeach
                                </select>

                                @if ($errors->has('course_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_code') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="pl-lg-4 row mt-3">
                              <div class="col-12 col-lg-4 col-md-6">
                                <label class="form-control-label" for="instructor_id">Instructor</label>
                                <select id="instructor_id" name="instructor_id" class="select2 form-control{{ $errors->has('instructor_id') ? ' is-invalid' : '' }} m-b" required>
                                  @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->employee->employee_no }}">
                                      {{ $instructor->employee->getEmployeeNo() }} | {{ $instructor->getName() }}
                                    </option>
                                  @endforeach
                                  @foreach ($admins as $admin)
                                    <option value="{{ $admin->employee->employee_no }}">
                                      {{ $admin->employee->getEmployeeNo() }} | {{ $admin->getName() }}
                                    </option>
                                  @endforeach
                                </select>

                                @if ($errors->has('instructor_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('instructor_id') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="pl-lg-4 row mt-3">
                              <div class="form-group{{ $errors->has('section') ? ' has-danger' : '' }} col-12 col-lg-4 col-md-6">
                                  <label class="form-control-label" for="section">
                                    Section (optional)
                                  </label>
                                  <input type="text" name="section" id="section" class="form-control form-control-alternative{{ $errors->has('section') ? ' is-invalid' : '' }}" placeholder="e.g. 101-A" value="{{ old('section', $sclass->section) }}">

                                  @if ($errors->has('section'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('section') }}</strong>
                                      </span>
                                  @endif
                              </div>
                              <div class="form-group{{ $errors->has('room') ? ' has-danger' : '' }} col-12 col-lg-4 col-md-6">
                                  <label class="form-control-label" for="room">
                                      Room (optional)
                                  </label>
                                  <input type="text" name="room" id="room" class="form-control form-control-alternative{{ $errors->has('room') ? ' is-invalid' : '' }}" placeholder="e.g. College Room" value="{{ old('room', $sclass->room) }}">

                                  @if ($errors->has('room'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('room') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                            <h6 class="heading-small text-muted mb-4 mt-3">
                              Schedule
                            </h6>
                            <div class="pl-lg-4 row">
                              <div class="col-12 col-md-6">
                                  <h6 class="heading-small text-muted mb-4 mt-3">
                                    Lecture
                                  </h6>

                                  <div class="row">
                                      <div class="col-12 col-md-6">
                                        <label class="form-control-label" for="lec_day">
                                          Day
                                        </label>
                                        <select id="lec_day" name="lec_day" class="form-control form-control-alternative m-b" required>
                                          <option value="M" {{ old('lec_day', $sclass->lec_day) == 'M' ? 'selected' : '' }}>Monday</option>
                                          <option value="T" {{  old('lec_day', $sclass->lec_day) == 'T' ? 'selected' : '' }}>Tuesday</option>
                                          <option value="W" {{  old('lec_day', $sclass->lec_day) == 'W' ? 'selected' : '' }}>Wednesday</option>
                                          <option value="TH" {{  old('lec_day', $sclass->lec_day) == 'TH' ? 'selected' : '' }}>Thursday</option>
                                          <option value="F" {{  old('lec_day', $sclass->lec_day) == 'F' ? 'selected' : '' }}>Friday</option>
                                        </select>
                                      </div>
                                  </div>

                                  <div class="row">
                                    <div class="form-group{{ $errors->has('lec_time_start') ? ' has-danger' : '' }} col-12 col-md-6 mt-3">
                                        <label class="form-control-label" for="lec_time_start">
                                          Time Start
                                        </label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                                            </div>
                                            <input type="time" name="lec_time_start" id="lec_time_start" class="form-control form-control{{ $errors->has('lec_time_start') ? ' is-invalid' : '' }}" value="{{ old('lec_time_start', $sclass->lec_time_start) }}" required>
                                        </div>

                                        @if ($errors->has('lec_time_start'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lec_time_start') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('lec_time_end') ? ' has-danger' : '' }} col-12 col-md-6 mt-3">
                                        <label class="form-control-label" for="lec_time_end">
                                          Time End
                                        </label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                                            </div>
                                            <input type="time" name="lec_time_end" id="lec_time_end" class="form-control form-control{{ $errors->has('lec_time_end') ? ' is-invalid' : '' }}" placeholder="Time End" value="{{ old('lec_time_end', $sclass->lec_time_end) }}" required>
                                        </div>

                                        @if ($errors->has('lec_time_end'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lec_time_end') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <h6 class="heading-small text-muted mb-4 mt-3">
                                  Laboratory (leave blank if the selected course has no lab)
                                </h6>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                      <label class="form-control-label" for="lab_day">
                                        Day
                                      </label>
                                      <select id="lab_day" name="lab_day" class="form-control form-control-alternative m-b">
                                        <option value="" {{ old('lab_day') == null ? 'selected' : '' }}>-- Select day --</option>
                                        <option value="M" {{ old('lab_day', $sclass->lab_day) == 'M' ? 'selected' : '' }}>Monday</option>
                                        <option value="T" {{  old('lab_day', $sclass->lab_day) == 'T' ? 'selected' : '' }}>Tuesday</option>
                                        <option value="W" {{  old('lab_day', $sclass->lab_day) == 'W' ? 'selected' : '' }}>Wednesday</option>
                                        <option value="TH" {{  old('lab_day', $sclass->lab_day) == 'TH' ? 'selected' : '' }}>Thursday</option>
                                        <option value="F" {{  old('lab_day', $sclass->lab_day) == 'F' ? 'selected' : '' }}>Friday</option>
                                      </select>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="form-group{{ $errors->has('lab_time_start') ? ' has-danger' : '' }} col-12 col-md-6 mt-3">
                                      <label class="form-control-label" for="lab_time_start">
                                        Time Start
                                      </label>
                                      <div class="input-group ">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                                          </div>
                                          <input type="time" name="lab_time_start" id="lab_time_start" class="form-control form-control{{ $errors->has('lab_time_start') ? ' is-invalid' : '' }}" placeholder="Time Start" value="{{ old('lab_time_start', $sclass->lab_time_start) }}">
                                      </div>

                                      @if ($errors->has('lab_time_start'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('lab_time_start') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="form-group{{ $errors->has('lab_time_end') ? ' has-danger' : '' }} col-12 col-md-6 mt-3">
                                      <label class="form-control-label" for="lab_time_end">
                                        Time End
                                      </label>
                                      <div class="input-group ">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                                          </div>
                                          <input type="time" name="lab_time_end" id="lab_time_end" class="form-control form-control{{ $errors->has('lab_time_end') ? ' is-invalid' : '' }}" placeholder="Time End" value="{{ old('lab_time_end', $sclass->lab_time_end) }}">
                                      </div>

                                      @if ($errors->has('lab_time_end'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('lab_time_end') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="pl-lg-4 row mt-4">
                                <div class="col">
                                    <button id="btnSubmit" type="submit" class="btn btn-success">
                                        Update Class
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="javascript:history.back()">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection