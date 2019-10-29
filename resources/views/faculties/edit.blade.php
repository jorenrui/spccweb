@extends('layouts.app', ['title' => 'Faculty'])

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
                      <h2>Edit Faculty</h2>
                      <hr>
                      <form method="POST" action="{{ action('FacultyController@update', $user->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="row">
                            <div class="col-12 col-lg-5">
                              <div class="form-control-label mb-2">
                                Profile Picture
                              </div>
                              <div class="form-group">
                                  <label id="browse-image" for="profile_picture" class="btn btn-outline-default">Choose Profile Picture</label>
                                  <input type="file" id="profile_picture" name="profile_picture" style="display: none">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                              <div class="col-12 col-lg-3 col-md-6">
                                  <label class="form-control-label" for="employee_no">Employee No.*</label>
                                  <input id="employee_no" name="employee_no" class="form-control mb-3" type="text" value="{{ $user->employee->employee_no }}">
                              </div>
                            </div>

                          <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                              <label class="form-control-label" for="date_employed">Date Employed*</label>
                              <input id="date_employed" name="date_employed" class="form-control mb-3" type="date" value="{{ $user->employee->date_employed }}" required>
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


                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Update Faculty</span>
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