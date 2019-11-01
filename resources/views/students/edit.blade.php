@extends('layouts.app', ['title' => 'Students'])

@section('styles')
<link href="{{ asset('vendor/select2-4.0.10/select2.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/select2-4.0.10/select2.full.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-mask-plugin-1.14.16/jquery.mask.min.js') }}"></script>

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

  $("#btnSubmit").click(function(){
      $('.input-mask').unmask();
  });
});
</script>
@endpush

@section('content')
    @include('layouts.headers.header', ['title' => 'Edit Student'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Students</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/students" class="btn btn-sm btn-outline-secondary">
                                    Back to list
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-post" method="POST" action="{{ action('StudentController@update', $user->id) }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">
                                Profile Picture
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="col-12 col-lg-5">
                                  <div class="form-group{{ $errors->has('profile_picture') ? ' has-danger' : '' }}">
                                        <label id="browse-image" for="profile_picture" class="btn btn-outline-default">Choose Profile Picture</label>
                                        <input type="file" id="profile_picture" name="profile_picture" style="display: none">

                                        @if ($errors->has('profile_picture'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('profile_picture') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                                </div>
                            </div>

                            <h6 class="heading-small text-muted mb-4">
                                Student information
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('student_no') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="student_no">Student No.</label>
                                    <input type="text" name="student_no" id="student_no" class="input-mask form-control form-control-alternative{{ $errors->has('student_no') ? ' is-invalid' : '' }}" placeholder="e.g. 04-17-30001" value="{{ old('student_no', $user->student->student_no) }}" data-mask="00-00-00000"  data-mask-clearifnotmatch="true" required autofocus>

                                    @if ($errors->has('student_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('student_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="col-12 col-lg-4 col-md-6">
                                  <label class="form-control-label" for="acad_term_admitted_id">Academic Term Admitted</label>
                                  <select id="acad_term_admitted_id" name="acad_term_admitted_id" class="select2 form-control m-b" required>
                                    @foreach ($acad_terms as $acad_term)
                                      @if($acad_term->acad_term_id == old('acad_term_admitted_id', $user->student->acad_term_admitted_id))
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
                                <div class="col-12 col-lg-3 col-md-6">
                                  <label class="form-control-label" for="curriculum_id">Curriculum</label>
                                  <select id="curriculum_id" name="curriculum_id" class="select2 form-control m-b" required>
                                    @foreach ($curriculums as $curriculum)
                                      @if($curriculum->curriculum_id == old('curriculum_id', $user->student->curriculum_id))
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
                            <div class="pl-lg-4 row mt-4">
                              <div class="form-group col row">
                                <div class="ml-3 form-control-label pt-1">
                                  Student Type
                                </div>
                                <div class="ml-3 custom-control custom-radio mb-3">
                                  <input name="student_type" class="custom-control-input" id="student_type1" type="radio" value="Regular" {{ old('student_type', $user->student->student_type) == 'Regular' ? 'checked' : '' }}>
                                  <label class="custom-control-label" for="student_type1">Regular</label>
                                </div>
                                <div class="ml-3 custom-control custom-radio mb-3">
                                  <input name="student_type" class="custom-control-input" id="student_type2" type="radio" value="Transferee" {{ old('student_type', $user->student->student_type) == 'Transferee' ? 'checked' : '' }}>
                                  <label class="custom-control-label" for="student_type2">Transferee</label>
                                </div>
                                <div class="ml-3 custom-control custom-radio mb-3">
                                  <input name="student_type" class="custom-control-input" id="student_type3" type="radio" value="Irregular" {{ old('student_type', $user->student->student_type) == 'Irregular' ? 'checked' : '' }}>
                                  <label class="custom-control-label" for="student_type3">Irregular</label>
                                </div>
                              </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('student_no') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="date_graduated">Date Graduated (optional)</label>
                                    <input type="date" name="date_graduated" id="date_graduated" class="input-mask form-control form-control-alternative{{ $errors->has('date_graduated') ? ' is-invalid' : '' }}" placeholder="e.g. 04-17-30001" value="{{ old('date_graduated', $user->student->date_graduated) }}">

                                    @if ($errors->has('date_graduated'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_graduated') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <h6 class="heading-small text-muted mb-4 mt-3">
                                Personal information
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="e.g. Juan" value="{{ old('first_name', $user->first_name) }}" required>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('middle_name') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="middle_name">Middle Name (optional)</label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control form-control-alternative{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" placeholder="e.g. Floresta" value="{{ old('middle_name', $user->middle_name) }}">

                                    @if ($errors->has('middle_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middle_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="e.g. Dela Cruz" value="{{ old('last_name', $user->last_name) }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="birthdate">Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control form-control-alternative{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" value="{{ old('birthdate', $user->birthdate) }}" required>

                                    @if ($errors->has('birthdate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('contact_no') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="contact_no">Contact No (optional)</label>
                                    <input type="text" name="contact_no" id="contact_no" class="input-mask form-control form-control-alternative{{ $errors->has('contact_no') ? ' is-invalid' : '' }}" placeholder="e.g. 09XX-XXX-XXXX" value="{{ old('contact_no', $user->contact_no) }}" data-mask="0000-000-0000"  data-mask-clearifnotmatch="true">

                                    @if ($errors->has('contact_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contact_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group col row">
                                    <div class="form-control-label pl-3">
                                        Gender
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender1" type="radio" value="M" {{ old('gender', $user->gender) == 'M' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender2" type="radio" value="F" {{ old('gender', $user->gender) == 'F' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender3" type="radio" value="" {{ old('gender', $user->gender) == null ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="gender3">Prefer not to say</label>
                                    </div>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }} col">
                                    <label class="form-control-label" for="address">Address (optional)</label>
                                    <input type="text" name="address" id="address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="e.g. 10th Avenue, Caloocan" value="{{ old('address', $user->address) }}">

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4 mt-3">
                                Educational Background
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('primary') ? ' has-danger' : '' }} col col-md-8">
                                    <label class="form-control-label" for="primary">Primary</label>
                                    <input type="text" name="primary" id="primary" class="form-control form-control-alternative{{ $errors->has('primary') ? ' is-invalid' : '' }}" placeholder="e.g. Antipolo Elementary School" value="{{ old('primary', $user->student->primary) }}" required>

                                    @if ($errors->has('primary'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('primary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('primary_sy') ? ' has-danger' : '' }} col col-md-4">
                                    <label class="form-control-label" for="primary_sy">School Year</label>
                                    <input type="text" name="primary_sy" id="primary_sy" class="form-control form-control-alternative{{ $errors->has('primary_sy') ? ' is-invalid' : '' }}" placeholder="e.g. 2000-2004" value="{{ old('primary_sy', $user->student->primary_sy) }}" data-mask="0000-0000"  data-mask-clearifnotmatch="true" required>

                                    @if ($errors->has('primary_sy'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('primary_sy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('intermediate') ? ' has-danger' : '' }} col col-md-8">
                                    <label class="form-control-label" for="intermediate">Intermediate</label>
                                    <input type="text" name="intermediate" id="intermediate" class="form-control form-control-alternative{{ $errors->has('intermediate') ? ' is-invalid' : '' }}" placeholder="e.g. Antipolo Elementary School" value="{{ old('intermediate', $user->student->intermediate) }}" required>

                                    @if ($errors->has('intermediate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('intermediate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('intermediate_sy') ? ' has-danger' : '' }} col col-md-4">
                                    <label class="form-control-label" for="intermediate_sy">School Year</label>
                                    <input type="text" name="intermediate_sy" id="intermediate_sy" class="form-control form-control-alternative{{ $errors->has('intermediate_sy') ? ' is-invalid' : '' }}" placeholder="e.g. 2004-2006" value="{{ old('intermediate_sy', $user->student->intermediate_sy) }}" data-mask="0000-0000"  data-mask-clearifnotmatch="true" required>

                                    @if ($errors->has('intermediate_sy'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('intermediate_sy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('secondary') ? ' has-danger' : '' }} col col-md-8">
                                    <label class="form-control-label" for="secondary">Secondary</label>
                                    <input type="text" name="secondary" id="secondary" class="form-control form-control-alternative{{ $errors->has('secondary') ? ' is-invalid' : '' }}" placeholder="e.g. Lakandula High School" value="{{ old('secondary', $user->student->secondary) }}" required>

                                    @if ($errors->has('secondary'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('secondary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('secondary_sy') ? ' has-danger' : '' }} col col-md-4">
                                    <label class="form-control-label" for="secondary_sy">School Year</label>
                                    <input type="text" name="secondary_sy" id="secondary_sy" class="form-control form-control-alternative{{ $errors->has('secondary_sy') ? ' is-invalid' : '' }}" placeholder="e.g. 2006-2010" value="{{ old('secondary_sy', $user->student->secondary_sy) }}" data-mask="0000-0000"  data-mask-clearifnotmatch="true" required>

                                    @if ($errors->has('secondary_sy'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('secondary_sy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4 mt-3">
                                Account information
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }} col col-lg-6">
                                    <label class="form-control-label" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-alternative{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" value="{{ old('username', $user->username) }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col col-lg-6">
                                    <label class="form-control-label" for="input-email">Email (optional)</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="e.g. juandelacruz@gmail.com" value="{{ old('email', $user->student->email) }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col col-lg-6">
                                    <label class="form-control-label" for="input-password">Change Password (optional)</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter password to change the current one.">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group col col-lg-6">
                                    <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="pl-lg-4 row mt-4">
                                <div class="col">
                                    <button id="btnSubmit" type="submit" class="btn btn-success">
                                        Update Student
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