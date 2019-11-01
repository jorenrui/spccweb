@extends('layouts.app', ['title' => auth()->user()->hasRole('student') ? 'View Curriculum' : 'Students'])

@section('styles')
<link href="{{ asset('css/print/tor.css') }}" rel="stylesheet" media="print">
@endsection

@push('js')
<script type="text/javascript">
    $('.btn-print').click(function() {
        window.print();
    });
</script>
@endpush

@section('content')

@include('layouts.headers.plain')

<div class="container-fluid mt--7">

  <div class="row mt-5 card-row">
    <div class="col-12 mb-5 mb-xl-0">
      <div class="card shadow card-tor">
        <div class="card-body row align-items-center">
          <div class="col">
            <h2 class="text-center mt-0">
              OFFICIAL TRANSCRIPT OF RECORD
            </h2>

            <div class="row mt-3">
              <div class="col row">
                  <dt class="col-2">
                    Name
                  </dt>
                  <dd class="col-10 underline text-uppercase">
                    {{ $user->getFullName() }}
                  </dd>

                  <dt class="col-2">
                    Address
                  </dt>
                  <dd class="col-10 underline text-uppercase">
                    @if($user->address != null)
                        {{ $user->address }}
                    @else
                        -
                    @endif
                  </dd>

                  <dt class="col-4">
                      Degree/Title/Course
                  </dt>
                  <dd class="col-8 underline text-uppercase">
                    {{ $degree }}
                  </dd>

                  <dt class="col-4">
                      Special Order No.
                  </dt>
                  <dd class="col-8 underline">
                      <input type="text" class="form-control input-tor" placeholder="Enter Special No"/>
                  </dd>

                  <dt class="col-4">
                      Date Graduated
                  </dt>
                  <dd class="col-8 underline">
                    @if($user->student->getDateGraduated() != null)
                      {{ $user->student->getDateGraduated() }})
                    @else
                      NA
                    @endif
                  </dd>
              </div>
              <div class="col row">
                  <dt class="col-5">
                      Date/Semester admitted
                  </dt>
                  <dd class="col-7 underline">
                    {{ $user->student->acadTerm->getAcadTerm2() }}
                  </dd>

                  <dt class="col-3">
                      College of
                  </dt>
                  <dd class="col-9 underline text-uppercase">
                      Information Technology
                  </dd>

                  <dt class="col-3">
                      Entrance Data
                  </dt>
                  <dd class="col-9 underline text-uppercase">
                      Transcript of Records
                  </dd>

                  <dt class="col-3">
                      Primary
                  </dt>
                  <dd class="col-9 underline text-uppercase">
                      @if($user->student->primary != null)
                          {{ $user->student->primary }} - {{ substr($user->student->primary_sy, 0, 4) }}
                      @else
                          -
                      @endif
                  </dd>

                  <dt class="col-3">
                      Intermediate
                  </dt>
                  <dd class="col-9 underline text-uppercase">
                      @if($user->student->intermediate != null)
                          {{ $user->student->intermediate }} - {{ substr($user->student->intermediate_sy, 0, 4) }}
                      @else
                          -
                      @endif
                  </dd>

                  <dt class="col-3">
                      Secondary
                  </dt>
                  <dd class="col-9 underline text-uppercase">
                      @if($user->student->secondary != null)
                          {{ $user->student->secondary }} - {{ substr($user->student->secondary_sy, 0, 4) }}
                      @else
                          -
                      @endif
                  </dd>
              </div>
            </div>

            <div class="table-responsive mt-3">
              <table class="table-curriculum table-tor align-items-center my-4">
                  <thead>
                      <tr class="text-center">
                        <th rowspan="2">Term</th>
                        <th>COLLEGIATE RECORD</th>
                        <th colspan="2">Grades</th>
                        <th rowspan="2">Credits</th>
                      </tr>
                      <tr class="text-center">
                        <th>Descriptive Title of the Course</th>
                        <th>Final</th>
                        <th>Re-Exam</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $count = 0; ?>
                    @if($user->student->student_type == 'Transferee')
                      @foreach($user->student->creditedCourses as $school)
                        @foreach($school->creditedCourses->groupBy('acad_term_id') as $cclasses)

                          <?php $count++; ?>

                          @if($loop->first)
                            <tr>
                              <td class="text-bold">{{ $cclasses[0]->acadTerm->getAcadTerm3()}}</td>
                              <td class="text-bold">{{ strtoupper($school->description) }}</td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          @else
                            <tr>
                              <td class="text-bold">{{ $cclasses[0]->acadTerm->getAcadTerm3()}}</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          @endif

                          @foreach($cclasses as $cclass)
                          <tr>
                            <td>{{ $cclass->course_code }}</td>
                            <td>{{ $cclass->description }}</td>
                            <td class="text-center">
                              @if( !$cclass->is_inc )
                                {{ $cclass->getGrade() }}
                              @else
                                INC
                              @endif
                            </td>
                            <td class="text-center">
                              @if( $cclass->is_inc )
                                {{ $cclass->getGrade() }}
                              @endif
                            </td>
                            <td class="text-center">
                              {{ $cclass->units }}
                            </td>
                          </tr>
                          @endforeach

                        @endforeach
                      @endforeach
                    @endif

                    @foreach($classes->groupBy('acad_term_id') as $sclasses)

                      @if($loop->first)
                        <tr>
                          <td class="text-bold">{{ $sclasses[0]->acadTerm->getAcadTerm3()}}</td>
                          <td class="text-bold">SYSTEMS PLUS COMPUTER COLLEGE - Caloocan</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      @else
                        <tr>
                          <td class="text-bold">{{ $sclasses[0]->acadTerm->getAcadTerm3()}}</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      @endif

                      @foreach($sclasses as $sclass)
                      <tr>
                        <td>{{ $sclass->getTORCourseCode($user->student_no) }}</td>
                        <td>{{ $sclass->getTORDescription($user->student_no) }}</td>
                        <td class="text-center">{{ $sclass->getGrade($user->student->student_no) }}</td>
                        <td class="text-center">{{ $sclass->getCompletion($user->student->student_no) }}</td>
                        <td class="text-center">{{ $sclass->course->units }}</td>
                      </tr>
                      @endforeach

                      @if($loop->last)
                      <tr>
                        <td></td>
                        <td class="warning">** ENTRY BELOW THIS LINE IS NOT VALID **</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      @endif
                    @endforeach
                  </tbody>
              </table>
            </div>

            <div class="mt-1 row note">
              <dt class="col-1">
                Credits:
              </dt>
              <dd class="col-11">
                One unit of credits is one hour lecture or recitation each week for the period of a complete semester.
              </dd>

              <dt class="col-1">
                NOTE:
              </dt>
              <dd class="col-11">
                This transcript is valid only when it bears the seal of the school. Any erasure or alteration on this copy renders the whole transcript invalid.
              </dd>
            </div>

            <div class="table-responsive">
              <table class="table-curriculum table-grading-system align-items-center my-4">
                <thead>
                  <tr>
                    <th colspan="11" class="text-center">GRADING SYSTEM</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td>1.00</td>
                    <td>=</td>
                    <td>96-100</td>
                    <td></td>
                    <td>2.25</td>
                    <td>=</td>
                    <td>84-86</td>
                    <td></td>
                    <td>INC</td>
                    <td>=</td>
                    <td class="text-left">Incomplete</td>
                  </tr>
                  <tr class="text-center">
                    <td>1.25</td>
                    <td>=</td>
                    <td>94-95</td>
                    <td></td>
                    <td>2.50</td>
                    <td>=</td>
                    <td>80-83</td>
                    <td></td>
                    <td>DRP</td>
                    <td>=</td>
                    <td class="text-left">Dropped</td>
                  </tr>
                  <tr class="text-center">
                    <td>1.50</td>
                    <td>=</td>
                    <td>92-93</td>
                    <td></td>
                    <td>2.75</td>
                    <td>=</td>
                    <td>78-79</td>
                    <td></td>
                    <td>UD</td>
                    <td>=</td>
                    <td class="text-left">Unofficially dropped</td>
                  </tr>
                  <tr class="text-center">
                    <td>1.75</td>
                    <td>=</td>
                    <td>89-91</td>
                    <td></td>
                    <td>3.00</td>
                    <td>=</td>
                    <td>75-77</td>
                    <td></td>
                    <td>NFE</td>
                    <td>=</td>
                    <td class="text-left">No Final Exam</td>
                  </tr>
                  <tr class="text-center">
                    <td>2.00</td>
                    <td>=</td>
                    <td>87-88</td>
                    <td></td>
                    <td>5.00</td>
                    <td>=</td>
                    <td>74-76</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="row">
              <div class="col row row-info">
                <dt class="col-4">
                  Prepared by:
                </dt>
                <dd class="col-8 underline">
                  {{ auth()->user()->getFullName() }}
                </dd>

                <dt class="col-4">
                  Checked by:
                </dt>
                <dd class="col-8 underline">
                  {{ $head_registrar->getFullName() }}
                </dd>

                <dt class="col-4">
                  Date Issued:
                </dt>
                <dd class="col-8 underline">
                  {{ date('F d, Y') }}
                </dd>
              </div>

              <div class="col text-center">
                <p class="signature mt-5">
                  <span class="text-uppercase text-underline">{{ $head_registrar->getName() }}</span>
                  <br>Registrar
                </p>
              </div>
            </div>

            <div class="col button-group text-right">
              <button class="btn btn-sm btn-outline-primary btn-print">Print</button>
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="javascript:history.back()">
                Return
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footers.auth')

</div>
@endsection