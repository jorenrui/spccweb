@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => 'Hello '. auth()->user()->getName() . '!',
        'description' => 'Update your profile information using the form below.',
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                @if(auth()->user()->gender == 'F')
                                    <img alt="Image placeholder" src="/storage/profile_pictures/default-female.png" class="">
                                @elseif(auth()->user()->gender == 'M')
                                    <img alt="Image placeholder" src="/storage/profile_pictures/default-male.png" class="rounded-circle">
                                @else
                                    <img alt="Image placeholder" src="/storage/profile_pictures/default.png" class="rounded-circle">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-8 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <h3>
                                        {{ auth()->user()->getName() }}
                                    </h3>
                                    <div class="h4 font-weight-300">
                                        @role('student')
                                            Student No. {{ auth()->user()->student->getStudentNo() }}
                                        @else
                                            Employee No. {{ auth()->user()->employee->getEmployeeNo() }}
                                        @endrole
                                    </div>

                                    <div class="h5 font-weight-300">
                                        Role: {{ auth()->user()->getRole() }}
                                    </div>
                                    <div>
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>

                                <hr class="my-4" />

                                <dl class="row text-sm">
                                    <dt class="col-5 text-right">
                                        Username:
                                    </dt>
                                    <dd class="col-7">
                                        {{ auth()->user()->username }}
                                    </dd>

                                    @unlessrole('student')
                                        @role('faculty')
                                        <dt class="col-5 text-right">
                                            Status:
                                        </dt>
                                        <dd class="col-7">
                                            {{ auth()->user()->employee->getStatus() }}
                                        </dd>
                                        @endrole

                                        <dt class="col-5 text-right">
                                            Date Employed:
                                        </dt>
                                        <dd class="col-7">
                                            {{ auth()->user()->employee->getDateEmployed() }}
                                        </dd>
                                    @else
                                        <dt class="col-5 text-right">
                                            Student Type:
                                        </dt>
                                        <dd class="col-7">
                                            {{ auth()->user()->student->student_type }}
                                        </dd>

                                        <dt class="col-5 text-right">
                                            Curriculum:
                                        </dt>
                                        <dd class="col-7">
                                            {{ auth()->user()->student->curriculum_id }}
                                        </dd>

                                        <dt class="col-5 text-right">
                                            Status:
                                        </dt>
                                        <dd class="col-7">
                                            {{ auth()->user()->student->getStatus() }}
                                        </dd>

                                        <dt class="col-5 text-right">
                                            Academic Term Admitted:
                                        </dt>
                                        <dd class="col-7">
                                            {{ auth()->user()->student->acadTerm->getAcadTerm() }}
                                        </dd>

                                        @if(auth()->user()->student->date_graduated != null)
                                        <dt class="col-5 text-right">
                                            Date Graduated:
                                        </dt>
                                        <dd class="col-7">
                                            {{ auth()->user()->student->getDateGraduated() }}
                                        </dd>
                                        @endif
                                    @endunlessrole

                                    <h6 class="col-12 heading-small text-muted mt-3">
                                        Personal Information
                                    </h6>

                                    @if(auth()->user()->getGender() != null)
                                    <dt class="col-5 text-right">
                                        Gender:
                                    </dt>
                                    <dd class="col-7">
                                        {{ auth()->user()->getGender() }}
                                    </dd>
                                    @endif

                                    <dt class="col-5 text-right">
                                        Birthdate:
                                    </dt>
                                    <dd class="col-7">
                                        @if(auth()->user()->getBirthdate() != null)
                                            {{ auth()->user()->getBirthdate() }}
                                        @else
                                            -
                                        @endif
                                    </dd>

                                    @if(auth()->user()->contact_no != null)
                                    <dt class="col-5 text-right">
                                        Contact No:
                                    </dt>
                                    <dd class="col-7">
                                        {{ auth()->user()->contact_no }}
                                    </dd>
                                    @endif

                                    <dt class="col-5 text-right">
                                        Address:
                                    </dt>
                                    <dd class="col-7">
                                        @if(auth()->user()->address != null)
                                            {{ auth()->user()->address }}
                                        @else
                                            -
                                        @endif
                                    </dd>

                                    @role('student')
                                        <h6 class="col-12 heading-small text-muted text-left mt-2">
                                            Educational Background
                                        </h6>

                                        <dt class="col-5 text-right">
                                            Primary:
                                        </dt>
                                        <dd class="col-7">
                                            @if(auth()->user()->student->primary != null)
                                                {{ auth()->user()->student->primary }},
                                                ({{ auth()->user()->student->primary_sy }})
                                            @else
                                                -
                                            @endif
                                        </dd>

                                        <dt class="col-5 text-right">
                                            Intermediate:
                                        </dt>
                                        <dd class="col-7">
                                            @if(auth()->user()->student->intermediate != null)
                                                {{ auth()->user()->student->intermediate }},
                                                ({{ auth()->user()->student->intermediate_sy }})
                                            @else
                                                -
                                            @endif
                                        </dd>

                                        <dt class="col-5 text-right">
                                            Secondary:
                                        </dt>
                                        <dd class="col-7">
                                            @if(auth()->user()->student->secondary != null)
                                                {{ auth()->user()->student->secondary }},
                                                ({{ auth()->user()->student->secondary_sy }})
                                            @else
                                                -
                                            @endif
                                        </dd>
                                    @endrole
                                </dl>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">Edit Profile</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">User information</h6>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First Name" value="{{ old('first_name', auth()->user()->first_name) }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('middle_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="middle_name">Middle Name (optional)</label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control form-control-alternative{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" placeholder="Middle Name" value="{{ old('middle_name', auth()->user()->middle_name) }}">

                                    @if ($errors->has('middle_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middle_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last Name" value="{{ old('last_name', auth()->user()->last_name) }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row mt-5 pl-3 form-group{{ $errors->has('gender') ? ' has-danger' : '' }}"">
                                    <div class="form-control-label pt-1">
                                        Gender
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender1" type="radio" value="M" {{ auth()->user()->gender == 'M' ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender2" type="radio" value="F" {{ auth()->user()->gender == 'F' ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender3" type="radio" value="" {{ auth()->user()->gender == null ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="gender3">Prefer not to say</label>
                                    </div>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="birthdate">Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control form-control-alternative{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" placeholder="Birthdate" value="{{ old('birthdate', auth()->user()->birthdate) }}" required>

                                    @if ($errors->has('birthdate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('contact_no') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="contact_no">Contact No (optional)</label>
                                    <input type="text" name="contact_no" id="contact_no" class="form-control form-control-alternative{{ $errors->has('contact_no') ? ' is-invalid' : '' }}" placeholder="Contact No" value="{{ old('contact_no', auth()->user()->contact_no) }}">

                                    @if ($errors->has('contact_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contact_no') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Address" value="{{ old('address', auth()->user()->address) }}" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-alternative{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" value="{{ old('username', auth()->user()->username) }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save Changes</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">Password</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">
                                        Current Password
                                    </label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="Current Password" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">
                                        New Password
                                    </label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm New Password" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Change password</button>
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