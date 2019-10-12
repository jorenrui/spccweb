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

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <h2>Credit Course</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('CreditedCoursesDetailsController@store', [$user->id, $school->credit_id]) }}">
                          @csrf

                          <div class="row">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="credit_id">School</label>
                                <input class="form-control mb-3" type="text" value="{{ $school->description }}" disabled>
                                <input id="credit_id" name="credit_id" type="text" value="{{ $school->credit_id }}"  style="display: none">
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-lg-4 col-md-6">
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

                          <div class="row mt-4">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="course_code">Course Code</label>
                                <input id="course_code" name="course_code" class="form-control mb-3" type="text" placeholder="e.g. CSC100" required>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="description">Description</label>
                                <input id="description" name="description" class="form-control mb-3" type="text" placeholder="e.g. Programming Fundamentals I" required>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-lg-2 col-md-6">
                                <label class="form-control-label" for="units">Units</label>
                                <input id="units" name="units" class="form-control mb-3" type="text" placeholder="e.g. 3" required>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-lg-2 col-md-6">
                                <label class="form-control-label" for="grade">Grade</label>
                                <input id="grade" name="grade" class="form-control mb-3" type="text" placeholder="e.g. 1.25" required>
                            </div>
                            <div class="col-12 col-lg-2 col-md-6">
                              <div class="form-control-label mb-3">Is INC?</div>
                              <label class="custom-toggle">
                                <input name="is_inc" type="checkbox">
                                <span class="custom-toggle-slider rounded-circle"></span>
                              </label>
                            </div>
                          </div>

                          @role('admin')
                          <div class="row mt-3">
                            <div class="col-12 col-md-6">
                              <label class="form-control-label" for="curriculum_details_id">
                                Credited Curriculum
                              </label>
                              <select name="curriculum_details_id" class="select2 form-control m-b" required>
                                @foreach ($user->student->curriculum->curriculumDetails as $curriculum_details)
                                  <option value="{{ $curriculum_details->curriculum_details_id }}">
                                    {{ $curriculum_details->course->getCourse() }}
                                  </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          @endrole

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Credit Course</span>
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