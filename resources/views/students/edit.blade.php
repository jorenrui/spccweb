@extends('layouts.app', ['title' => 'Students'])

@section('styles')
<link href="{{ asset('vendor/select2-4.0.10/select2.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/select2-4.0.10/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.select2').select2();

  let intervalFunc = function () {
      let image_path = $('#profile_picture').val().split('\\');
      $('#browse-image').html(image_path[image_path.length - 1]);
  };

  $('#profile_picture').on('click', function () {
      setInterval(intervalFunc, 1);
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
                      <h2>Edit Student</h2>
                      <hr>
                      <form method="POST" action="{{ action('StudentController@update', $user->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="row">
                            <div class="col-12 col-lg-5">
                              <div class="form-control-label mb-2">
                                Profile Picture
                              </div>
                              <div class="form-group">
                                  <label id="browse-image" for="profile_picture" class="btn btn-outline-default">Choose Profile Picture</label>
                                  <input type="file" id="profile_picture" name="profile_picture" style="display: none" value="{{ $user->profile_picture}}">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="student_no">Student No.*</label>
                                <input id="student_no" name="student_no" class="form-control mb-3" type="text" value="{{ $user->student->student_no }}">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-4 col-md-6">
                              <label class="form-control-label" for="acad_term_admitted_id">Academic Term Admitted*</label>
                              <select id="acad_term_admitted_id" name="acad_term_admitted_id" class="select2 form-control m-b" required>
                                @foreach ($acad_terms as $acad_term)
                                  @if($acad_term->acad_term_id == $user->student->acad_term_admitted_id)
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

                          <div class="row mt-4">
                            <div class="col-12 col-lg-3 col-md-6">
                              <label class="form-control-label" for="curriculum_id">Curriculum*</label>
                              <select id="curriculum_id" name="curriculum_id" class="select2 form-control m-b" required>
                                @foreach ($curriculums as $curriculum)
                                  @if($curriculum->curriculum_id == $user->student->curriculum_id)
                                    <option value="{{ $curriculum->curriculum_id }}" selected>
                                      {{ $curriculum->curriculum_id }}
                                    </option>
                                  @else
                                    <option value="{{ $curriculum->curriculum_id }}">
                                      {{ $curriculum->curriculum_id }}
                                    </option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row mt-4 pl-3">
                            <div class="form-control-label pt-1">
                              Student Type*
                            </div>
                            <div class="ml-3 custom-control custom-radio mb-3">
                              <input name="student_type" class="custom-control-input" id="student_type1" type="radio" value="Regular" {{ $user->student->student_type == 'Regular' ? 'checked' : '' }}>
                              <label class="custom-control-label" for="student_type1">Regular</label>
                            </div>
                            <div class="ml-3 custom-control custom-radio mb-3">
                              <input name="student_type" class="custom-control-input" id="student_type2" type="radio" value="Transferee" {{ $user->student->student_type == 'Transferee' ? 'checked' : '' }}>
                              <label class="custom-control-label" for="student_type2">Transferee</label>
                            </div>
                          </div>

                          <h3 class="mt-5">Personal Details</h3>

                          <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                              <label class="form-control-label" for="first_name">First Name*</label>
                              <input id="first_name" name="first_name" class="form-control mb-3" type="text" placeholder="e.g. Juan" value="{{ $user->first_name }}" required>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                              <label class="form-control-label" for="middle_name">Middle Name</label>
                              <input id="middle_name" name="middle_name" class="form-control mb-3" type="text" placeholder="e.g. Floresta" value="{{ $user->middle_name }}">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                              <label class="form-control-label" for="last_name">Last Name*</label>
                              <input id="last_name" name="last_name" class="form-control mb-3" type="text" placeholder="e.g. Dela Cruz" value="{{ $user->last_name }}" required>
                            </div>
                          </div>

                          <div class="row mt-3 pl-3">
                            <div class="form-control-label pt-1">
                              Gender*
                            </div>
                            <div class="ml-3 custom-control custom-radio mb-3">
                              <input name="gender" class="custom-control-input" id="gender1" type="radio" value="M" {{ $user->gender == 'M' ? 'checked' : '' }}>
                              <label class="custom-control-label" for="gender1">Male</label>
                            </div>
                            <div class="ml-3 custom-control custom-radio mb-3">
                              <input name="gender" class="custom-control-input" id="gender2" type="radio" value="F" {{ $user->gender == 'F' ? 'checked' : '' }}>
                              <label class="custom-control-label" for="gender2">Female</label>
                            </div>
                            <div class="ml-3 custom-control custom-radio mb-3">
                              <input name="gender" class="custom-control-input" id="gender3" type="radio" value="" {{ $user->gender == null ? 'checked' : '' }}>
                              <label class="custom-control-label" for="gender3">Prefer not to say</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="birthdate">Birthdate*</label>
                                <input id="birthdate" name="birthdate" class="form-control mb-3" type="date" value="{{ $user->birthdate }}" required>
                            </div>
                          </div>

                          <h3 class="mt-5">Contact Details</h3>

                          <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                              <label class="form-control-label" for="address">Address*</label>
                              <input id="address" name="address" class="form-control mb-3" type="text" placeholder="e.g. 10th Ave, Caloocan City" value="{{ $user->address }}" required>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                              <label class="form-control-label" for="email">Email</label>
                              <input id="email" name="email" class="form-control mb-3" type="email" placeholder="e.g. juandelacruz@gmail.com" value="{{ $user->email }}">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                              <label class="form-control-label" for="contact_no">Contact No.</label>
                              <input id="contact_no" name="contact_no" class="form-control mb-3" type="text" placeholder="e.g. 09XXXXXXXXX" value="{{ $user->contact_no }}">
                            </div>
                          </div>

                          <h3 class="mt-5">Educational Background</h3>

                          <div class="row">
                            <div class="col-12 col-sm-8">
                              <label class="form-control-label" for="primary">Primary*</label>
                              <input id="primary" name="primary" class="form-control mb-3" type="text" placeholder="e.g. Antipolo Elementary School" value="{{ $user->student->primary }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                              <label class="form-control-label" for="primary_sy">School Year*</label>
                              <input id="primary_sy" name="primary_sy" class="form-control mb-3" type="text" placeholder="e.g. 2000-2004" value="{{ $user->student->primary_sy }}" required>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-sm-8">
                              <label class="form-control-label" for="intermediate">Intermediate*</label>
                              <input id="intermediate" name="intermediate" class="form-control mb-3" type="text" placeholder="e.g. Antipolo Elementary School" value="{{ $user->student->intermediate }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                              <label class="form-control-label" for="intermediate_sy">School Year*</label>
                              <input id="intermediate_sy" name="intermediate_sy" class="form-control mb-3" type="text" placeholder="e.g. 2004-2006" value="{{ $user->student->intermediate_sy }}" required>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-sm-8">
                              <label class="form-control-label" for="secondary">Secondary*</label>
                              <input id="secondary" name="secondary" class="form-control mb-3" type="text" placeholder="e.g. Lakandula High School" value="{{ $user->student->secondary }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                              <label class="form-control-label" for="secondary_sy">School Year*</label>
                              <input id="secondary_sy" name="secondary_sy" class="form-control mb-3" type="text" placeholder="e.g. 2006-2010" value="{{ $user->student->secondary_sy }}" required>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Update Student</span>
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