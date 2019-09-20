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

  $('#time_start').on('input', function() {
    let time_start = $(this).val();
    let hours = Number(time_start[0] + time_start[1]) + 3;
    let time_end = null;

    if(hours >= 24)
      hours -= 24;

    if(hours < 10)
      time_end = '0' + (hours + time_start.substring(2));
    else
      time_end = hours + time_start.substring(2);

    $('#time_end').val(time_end).change();
  });
});
</script>
@endpush

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <h2>Edit Class</h2>
                      <hr>
                      <form id="form-post" method="POST"  action="{{ action('SClassController@update', $sclass->class_id) }}">
                          @csrf
                          @method('PUT')

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="acad_term_id">Academic Term</label>
                                <select id="acad_term_id" name="acad_term_id" class="select2 form-control m-b" required>
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
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="course_code">Course</label>
                                <select id="course_code" name="course_code" class="select2 form-control m-b" required>
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
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="section">Section (optional)</label>
                                <input id="section" name="section" class="form-control mb-3" type="text" placeholder="e.g. 401-A" value="{{ $sclass->section }}">
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="room">Room (optional)</label>
                                <input id="room" name="room" class="form-control mb-3" type="text" placeholder="e.g. College Room" value="{{ $sclass->room }}">
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="instructor_id">Instructor</label>
                                <select id="instructor_id" name="instructor_id" class="select2 form-control m-b" required>
                                  @foreach ($instructors as $instructor)
                                    @if($sclass->instructor_id == $instructor->employee->employee_no)
                                      <option value="{{ $instructor->employee->employee_no }}" selected>
                                        {{ $instructor->employee->employee_no }} | {{ $instructor->getName() }}
                                      </option>
                                    @else
                                    <option value="{{ $instructor->employee->employee_no }}">
                                      {{ $instructor->employee->employee_no }} | {{ $instructor->getName() }}
                                    </option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                          </div>

                          <hr>

                          <h3 class="mt-5">Schedule</h3>

                          <div class="form-control-label mt-4 mb-2">Day:</div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="day" class="custom-control-input" id="day1" type="radio" value="M" {{ $sclass->day == 'M' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="day1">Monday</label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="day" class="custom-control-input" id="day2" type="radio" value="T" {{ $sclass->day == 'T' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="day2">Tuesday</label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="day" class="custom-control-input" id="day3" type="radio" value="W" {{ $sclass->day == 'W' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="day3">Wednesday</label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="day" class="custom-control-input" id="day4" type="radio" value="TH" {{ $sclass->day == 'TH' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="day4">Thursday</label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="day" class="custom-control-input" id="day5" type="radio" value="F" {{ $sclass->day == 'F' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="day5">Friday</label>
                          </div>

                          <div class="row mt-3">
                            <div class="col-6 col-md-3">
                                <label class="form-control-label" for="time_start">Time Start</label>
                                <input id="time_start" name="time_start" type="time" class="form-control m-b" autocomplete="off" value="{{ $sclass->time_start }}" required>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-control-label" for="time_end">Time End</label>
                                <input id="time_end" name="time_end" type="time" class="form-control m-b" autocomplete="off" value="{{ $sclass->time_end }}" required>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Update Class</span>
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