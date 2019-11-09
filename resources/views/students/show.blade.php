@extends('layouts.app', ['title' => 'Students'])

@section('styles')
<link href="{{ asset('vendor/footable/footable.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/footable/footable.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.footable').footable();
  });
</script>
@endpush

@section('content')
    @include('layouts.headers.empty')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-12 col-xl-5 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <img alt="Profile Picture placeholder"
                                src="{{ asset('/storage/profile_pictures/' . $user->profile_picture) }}"
                                class="rounded-circle">
                    </div>
                </div>
            </div>

            <div class="card-body mt-8 pt-md-4">
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <h2>
                                {{ $user->getName() }}
                            </h2>
                            <div class="h4 font-weight-300">
                                Student No. {{ $user->student->getStudentNo() }}
                            </div>
                            <div class="h4 font-weight-300 mt-3">
                                {{ $user->email }}
                            </div>
                            <div class="h5 font-weight-300">
                                {{ $degree }}
                            </div>
                        </div>

                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-info" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-student-tab" data-toggle="tab" href="#tabs-student" role="tab" aria-controls="tabs-student" aria-selected="true"><i class="ni ni-badge mr-2"></i>Student Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-personal-tab" data-toggle="tab" href="#tabs-personal" role="tab" aria-controls="tabs-personal" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Personal Info</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="infoTabContent">

                                    <!-- Student Info Tab -->
                                    <div class="tab-pane fade show active" id="tabs-student" role="tabpanel" aria-labelledby="tabs-student-tab">

                                        <dl class="row text-sm">
                                            <dt class="col-5 text-right">
                                                Username:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->username }}
                                            </dd>

                                            <dt class="col-5 text-right">
                                                Student Type:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->student->getStudentType() }}
                                            </dd>

                                            <dt class="col-5 text-right">
                                                Curriculum:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->student->curriculum_id }}
                                            </dd>

                                            <dt class="col-5 text-right">
                                                Status:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->student->getStatus() }}
                                            </dd>

                                            <dt class="col-5 text-right">
                                                Academic Term Admitted:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->student->acadTerm->getAcadTerm() }}
                                            </dd>

                                            @if($user->student->date_graduated != null)
                                            <dt class="col-5 text-right">
                                                Date Graduated:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->student->getDateGraduated() }}
                                            </dd>
                                            @endif

                                        </dl>

                                        @role('admin|registrar')
                                        <div class="row">
                                            <div class="col text-center">
                                                <a href="/students" class="btn btn-outline-secondary btn-sm">
                                                    Return
                                                </a>

                                                <a href="/students/{{ $user->id }}/edit" class="btn btn-outline-info btn-sm">
                                                Edit Student
                                                </a>

                                                <form action="{{ action('StudentController@destroy', $user->id) }}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirm('Are you sure you want to delete {{ $user->getName() }}?') ? this.parentElement.submit() : ''">
                                                        Delete Student
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        @endrole

                                    </div>
                                    <!-- end Student Info Tab -->

                                    <!-- Personal Info Tab -->
                                    <div class="tab-pane fade" id="tabs-personal" role="tabpanel" aria-labelledby="tabs-personal-tab">

                                        <dl class="row text-sm">
                                            <h6 class="col-12 heading-small text-muted">
                                                Personal Information
                                            </h6>

                                            @if($user->getGender() != null)
                                            <dt class="col-5 text-right">
                                                Gender:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->getGender() }}
                                            </dd>
                                            @endif

                                            <dt class="col-5 text-right">
                                                Birthdate:
                                            </dt>
                                            <dd class="col-7">
                                                @if($user->getBirthdate() != null)
                                                    {{ $user->getBirthdate() }}
                                                @else
                                                    -
                                                @endif
                                            </dd>

                                            @if($user->contact_no != null)
                                            <dt class="col-5 text-right">
                                                Contact No:
                                            </dt>
                                            <dd class="col-7">
                                                {{ $user->contact_no }}
                                            </dd>
                                            @endif

                                            <dt class="col-5 text-right">
                                                Address:
                                            </dt>
                                            <dd class="col-7">
                                                @if($user->address != null)
                                                    {{ $user->address }}
                                                @else
                                                    -
                                                @endif
                                            </dd>

                                            <h6 class="col-12 heading-small text-muted text-left mt-2">
                                                Educational Background
                                            </h6>

                                            <dt class="col-5 text-right">
                                                Primary:
                                            </dt>
                                            <dd class="col-7">
                                                @if($user->student->primary != null)
                                                    {{ $user->student->primary }}, ({{ $user->student->primary_sy }})
                                                @else
                                                    -
                                                @endif
                                            </dd>

                                            <dt class="col-5 text-right">
                                                Intermediate:
                                            </dt>
                                            <dd class="col-7">
                                                @if($user->student->intermediate != null)
                                                    {{ $user->student->intermediate }}, ({{ $user->student->intermediate_sy }})
                                                @else
                                                    -
                                                @endif
                                            </dd>

                                            <dt class="col-5 text-right">
                                                Secondary:
                                            </dt>
                                            <dd class="col-7">
                                                @if($user->student->secondary != null)
                                                    {{ $user->student->secondary }}, ({{ $user->student->secondary_sy }})
                                                @else
                                                    -
                                                @endif
                                            </dd>
                                        </dl>

                                    </div>
                                    <!-- end Personal Info Tab -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>

        <div class="col-12 col-xl-7 mb-5 mb-xl-0">

          @include('layouts.headers.messages')

          <div class="card shadow">
          @if(count($grades) > 0)
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Schedule</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                @if(count($m_grades) > 0)
                <table class="table footable align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Monday</th>
                            <th></th>
                            <th data-breakpoints="all" class="bg-white">Credits:</th>
                            <th data-breakpoints="all" class="bg-white">Room:</th>
                            <th data-breakpoints="all" class="bg-white">Instructor:</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($m_grades as $grade)

                        @if($grade->sclass->lec_day == 'M' && $grade->sclass->lab_day == 'M')
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLecTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LEC)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLabTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LAB)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @else
                            <tr class="bg-white">
                                <td scope="row">
                                    @if($grade->sclass->lec_day == 'M')
                                        {{ $grade->sclass->getLecTime() }}
                                    @else
                                        {{ $grade->sclass->getLabTime() }}
                                    @endif
                                </td>
                                <td>
                                    {{ $grade->sclass->getCourse() }}
                                    @if($grade->sclass->lec_day == 'M')
                                        (LEC)
                                    @else
                                        (LAB)
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @endif

                      @endforeach
                    </tbody>
                </table>
                @endif

                @if(count($t_grades) > 0)
                <table class="table footable align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Tuesday</th>
                            <th></th>
                            <th data-breakpoints="all" class="bg-white">Credits:</th>
                            <th data-breakpoints="all" class="bg-white">Room:</th>
                            <th data-breakpoints="all" class="bg-white">Instructor:</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($t_grades as $grade)

                        @if($grade->sclass->lec_day == 'T' && $grade->sclass->lab_day == 'T')
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLecTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LEC)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLabTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LAB)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @else
                            <tr class="bg-white">
                                <td scope="row">
                                    @if($grade->sclass->lec_day == 'T')
                                        {{ $grade->sclass->getLecTime() }}
                                    @else
                                        {{ $grade->sclass->getLabTime() }}
                                    @endif
                                </td>
                                <td>
                                    {{ $grade->sclass->getCourse() }}
                                    @if($grade->sclass->lec_day == 'T')
                                        (LEC)
                                    @else
                                        (LAB)
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @endif

                      @endforeach
                    </tbody>
                </table>
                @endif

                @if(count($w_grades) > 0)
                <table class="table footable align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>wednesday</th>
                            <th></th>
                            <th data-breakpoints="all" class="bg-white">Credits:</th>
                            <th data-breakpoints="all" class="bg-white">Room:</th>
                            <th data-breakpoints="all" class="bg-white">Instructor:</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($w_grades as $grade)

                        @if($grade->sclass->lec_day == 'W' && $grade->sclass->lab_day == 'W')
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLecTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LEC)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLabTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LAB)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @else
                            <tr class="bg-white">
                                <td scope="row">
                                    @if($grade->sclass->lec_day == 'W')
                                        {{ $grade->sclass->getLecTime() }}
                                    @else
                                        {{ $grade->sclass->getLabTime() }}
                                    @endif
                                </td>
                                <td>
                                    {{ $grade->sclass->getCourse() }}
                                    @if($grade->sclass->lec_day == 'W')
                                        (LEC)
                                    @else
                                        (LAB)
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @endif

                      @endforeach
                    </tbody>
                </table>
                @endif

                @if(count($th_grades) > 0)
                <table class="table footable align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Thursday</th>
                            <th></th>
                            <th data-breakpoints="all" class="bg-white">Credits:</th>
                            <th data-breakpoints="all" class="bg-white">Room:</th>
                            <th data-breakpoints="all" class="bg-white">Instructor:</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($th_grades as $grade)

                        @if($grade->sclass->lec_day == 'TH' && $grade->sclass->lab_day == 'TH')
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLecTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LEC)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLabTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LAB)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @else
                            <tr class="bg-white">
                                <td scope="row">
                                    @if($grade->sclass->lec_day == 'TH')
                                        {{ $grade->sclass->getLecTime() }}
                                    @else
                                        {{ $grade->sclass->getLabTime() }}
                                    @endif
                                </td>
                                <td>
                                    {{ $grade->sclass->getCourse() }}
                                    @if($grade->sclass->lec_day == 'TH')
                                        (LEC)
                                    @else
                                        (LAB)
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @endif

                      @endforeach
                    </tbody>
                </table>
                @endif

                @if(count($f_grades) > 0)
                <table class="table footable align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Friday</th>
                            <th></th>
                            <th data-breakpoints="all" class="bg-white">Credits:</th>
                            <th data-breakpoints="all" class="bg-white">Room:</th>
                            <th data-breakpoints="all" class="bg-white">Instructor:</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($f_grades as $grade)

                        @if($grade->sclass->lec_day == 'F' && $grade->sclass->lab_day == 'F')
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLecTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LEC)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row">{{ $grade->sclass->getLabTime() }}</td>
                                <td>{{ $grade->sclass->getCourse() }} (LAB)</td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @else
                            <tr class="bg-white">
                                <td scope="row">
                                    @if($grade->sclass->lec_day == 'F')
                                        {{ $grade->sclass->getLecTime() }}
                                    @else
                                        {{ $grade->sclass->getLabTime() }}
                                    @endif
                                </td>
                                <td>
                                    {{ $grade->sclass->getCourse() }}
                                    @if($grade->sclass->lec_day == 'F')
                                        (LEC)
                                    @else
                                        (LAB)
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->course->getCredits() }}</td>
                                <td>
                                    @if($grade->sclass->room != null)
                                        {{ $grade->sclass->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $grade->sclass->instructor->user->getNameWithTitle() }}</td>
                            </tr>
                        @endif

                      @endforeach
                    </tbody>
                </table>
                @endif
            </div>

          @else
            <div class="row mt-3 mb-5">
                <div class="col text-center">
                    @if( $user->student->getDateGraduated() != null )
                        <p class="lead">Student has already graduated.</p>
                    @elseif( !$user->student->is_paid )
                        <p class="lead">Student hasn't paid the unsettled amount yet.</p>
                    @else
                        <p class="lead">No Currently Enrolled Courses</p>
                    @endif
                    <br>
                    @role('admin')
                    <div class="col">
                        @if($user->student->getDateGraduated() != null)
                            <a href="/students/{{ $user->id }}/tor" class="btn btn-lg btn-primary">
                            View TOR
                            </a>
                        @elseif( $user->student->is_paid )
                            <a href="/students/{{ $user->id }}/enlist" class="btn btn-lg btn-primary">
                            Enlist Course
                            </a>
                        @endif
                    </div>
                    @endrole
                </div>
            </div>
          @endif

            @role('admin|registrar')
            <div class="card-footer text-center">
                <div class="row">
                    <div class="col">
                        <a href="/students/{{ $user->id }}/enlistment" class="btn btn-outline-info btn-sm">
                        View Enlistment
                        </a>
                        <a href="/students/{{ $user->id }}/grades" class="btn btn-outline-info btn-sm">
                        View Grades
                        </a>
                        <a href="/students/{{ $user->id }}/curriculum" class="btn btn-outline-info btn-sm">
                        View Curriculum
                        </a>
                        @if($user->student->getStudentType() == 'Transferee')
                        <a href="/students/{{ $user->id }}/credited_courses" class="btn btn-outline-info btn-sm">
                        View Credited Courses
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endrole
          </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection