@extends('layouts.app', ['title' => auth()->user()->hasRole('student') ? 'View Curriculum' : 'Students'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col col-md-8">
                <h2 class="mb-0">{{ $user->student->getStudentNo() }} {{ $user->getName()}}</h2>
                <p class="text-muted text-sm">{{ $degree }}</p>
                <p>
                  {{ $curriculum->curriculum_id }} Curriculum
                  <br>
                  Effective S.Y.: {{ $curriculum->effective_sy }}
                  <br>
                  Total Units: {{ $curriculum->getTotalUnits() }}
                </p>

                <div class="row">
                  <div class="col">
                    @role('admin|registrar')
                      <a href="/students/{{ $user->id }}" class="btn btn-sm btn-outline-secondary">Return</a>
                      @role('registrar')
                      <a href="/students/{{ $user->id }}/tor" class="btn btn-sm btn-outline-primary">View TOR</a>
                      @endrole
                    @endrole
                    <a href="/students/{{ $user->id }}/curriculum_with_grades" class="btn btn-sm btn-outline-primary">View Curriculum with Grades</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @if(count($curriculum_details) > 0)
      @foreach ($curriculum_details as $cur_details)
        <!-- Curriculum Details per School Year -->
        @foreach ($cur_details->groupBy('semester') as $cur_details)
          <div class="row mt-3">
            <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">

                  <div class="card-header border-0">
                    <h3 class="mb-0">{{ $cur_details[0]->getAcadTerm() }}</h3>
                  </div>

                  <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                              <tr>
                                  <th scope="col" class="text-center">Course Code</th>
                                  <th scope="col" class="text-left">Course Title</th>
                                  <th scope="col" class="text-center">Units</th>
                                  <th scope="col" class="text-center">Lab Units</th>
                                  <th scope="col" class="text-center">Pre-requisite(s)</th>
                                  <th scope="col" class="text-center">Grade</th>
                                  <th scope="col" class="text-center">COMP.</th>
                              </tr>
                          </thead>
                          <tbody>
                            <!-- Curriculum Details per School Year -->
                            @foreach ($cur_details as $cur_detail)
                              <tr>
                                  <td class="text-center" scope="row">
                                    {{ $cur_detail->course_code }}
                                  </td>
                                  <td class="text-left">{{ $cur_detail->course->description }}</td>
                                  <td class="text-center">{{ $cur_detail->course->units }}</td>
                                  <td class="text-center">{{ $cur_detail->course->lab_units }}</td>
                                  <td class="text-center">
                                    {{ $cur_detail->getYearStadingReq() }}
                                    @if (count($cur_detail->prerequisites) > 0 && $cur_detail->getYearStadingReq() != '')
                                        ,
                                    @endif
                                    @foreach($cur_detail->prerequisites as $prereq)
                                      {{ $prereq->course_code }}
                                      @if($loop->iteration != $loop->count)
                                        ,
                                      @endif
                                    @endforeach
                                  </td>
                                  <td class="text-center">
                                    {{ $cur_detail->getGrade($grades, $user, true) }}
                                  </td>
                                  <td class="text-center">
                                    {{ $cur_detail->getCompletion($grades, $user) }}
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>

              </div>
            </div>
          </div>
        @endforeach
      @endforeach
    @else
      <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-body row mt-3 mb-5">
                  <div class="col text-center">
                      <p class="lead">Curriculum is empty</p>
                      <br>
                      <a href="/curriculum_details/create/{{ $curriculum->curriculum_id }}" class="btn btn-primary btn-lg">Add Course to Curriculum</a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    @endif

      @include('layouts.footers.auth')
    </div>
@endsection