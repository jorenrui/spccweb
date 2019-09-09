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
                      <h2>Add Class</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('SClassController@store') }}">
                          @csrf

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="acad_term_id">Academic Term</label>
                                <select id="acad_term_id" name="acad_term_id" class="select2 form-control m-b" required>
                                  @foreach ($acad_terms as $acad_term)
                                    <option value="{{ $acad_term->acad_term_id }}">
                                      {{ $acad_term->getAcadTerm() }}
                                    </option>
                                  @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="course_code">Course</label>
                                <select id="course_code" name="course_code" class="select2 form-control m-b" required>
                                  @foreach ($courses as $course)
                                    <option value="{{ $course->course_code }}">{{ $course->course_code }} | {{ $course->description }}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="instructor_id">Instructor</label>
                                <select id="instructor_id" name="instructor_id" class="select2 form-control m-b" required>
                                  @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->employee->employee_no }}">
                                      {{ $instructor->employee->employee_no }} | {{ $instructor->getName() }}
                                    </option>
                                  @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="day">Day</label>
                                <select id="day" name="day" class="select2-nosearch form-control m-b" required>
                                  <option value="M" selected>Monday</option>
                                  <option value="T">Tuesday</option>
                                  <option value="W">Wednesday</option>
                                  <option value="TH">Thursday</option>
                                  <option value="F">Friday</option>
                                </select>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="time">Time</label>
                                <select id="time" name="time" class="select2-nosearch form-control m-b" required>
                                  <option value="9-12" selected>9:00-12:00PM</option>
                                </select>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Add Class</span>
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