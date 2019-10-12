@extends('layouts.app', ['title' => 'Manage Curriculum'])

@section('styles')
<link href="{{ asset('vendor/select2-4.0.10/select2.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/select2-4.0.10/select2.full.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: 'Select a course'
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
                      <h2>Add Course to Curriculum</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('CurriculumDetailsController@store') }}">
                          @csrf

                          <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="curriculum_id">Curriculum ID</label>
                                <input class="form-control mb-3" type="text" value="{{ $curriculum->curriculum_id }}" disabled>
                                <input id="curriculum_id" name="curriculum_id" type="text" value="{{ $curriculum->curriculum_id }}"  style="display: none">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="sy">School Year</label>
                                <select id="sy" name="sy" class="form-control m-b" required>
                                    <option value="1" selected>First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="semester">Semester</label>
                                <select id="semester" name="semester" class="form-control m-b" required>
                                    <option value="1" selected>First Semester</option>
                                    <option value="2">Second Semester</option>
                                    <option value="3">Third Semester</option>
                                    <option value="4">Fourth Semester</option>
                                    <option value="9">Summer</option>
                                </select>
                            </div>
                          </div>

                          <div class="row mt-5">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="course_code">Course</label>
                                <select id="course_code" name="course_code" class="select2 form-control m-b" required>
                                  @foreach ($courses as $course)
                                    <option value="{{ $course->course_code }}">
                                      {{ $course->getCourse() }}
                                    </option>
                                  @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-md-6">
                                  <label class="form-control-label" for="pre_req">
                                    Pre-requisite (optional)
                                  </label>
                                  <select id="pre_req" name="pre_req[]" class="select2 form-control m-b"  multiple="multiple">
                                    @foreach ($prereq_courses as $course)
                                      <option value="{{ $course->course_code }}">
                                        {{ $course->course_code }} | {{ $course->course->description }}
                                      </option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>

                          <div class="row mt-5 pl-3">
                            <div class="form-control-label pt-1">
                              Year Standing Requirement:
                            </div>
                            <div class="ml-3 custom-control custom-radio mb-3">
                              <input name="is_year_standing" class="custom-control-input" id="is_year_standing1" type="radio" value="1">
                              <label class="custom-control-label" for="is_year_standing1">Yes</label>
                            </div>
                            <div class="ml-3 custom-control custom-radio mb-3">
                              <input name="is_year_standing" class="custom-control-input" id="is_year_standing2" type="radio" value="0" checked>
                              <label class="custom-control-label" for="is_year_standing2">No</label>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Add Course to Curriculum</span>
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