@extends('layouts.app', ['title' => auth()->user()->hasRole('student') ? 'View Enlistment' : 'Students'])

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
    @include('layouts.headers.exam_cards')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-md-8">
                          <h3 class="mb-0">
                            @role('admin|registrar')
                              Student's Grades
                            @else
                              Student's Enlistment
                            @endrole
                            | {{ $user->student->getStudentNo() }} {{ $user->getName()}}
                          </h3>
                          <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>

                        @role('admin|registrar|head registrar|student')
                        <div class="col text-right">
                          <a href="/students/{{ $user->id }}/grade_slip/{{ $selected_acad_term }}" class="btn btn-sm btn-outline-primary">Grade Slip</a>
                          <a href="/students/{{ $user->id }}/scholastic_record/{{ $selected_acad_term }}" class="btn btn-sm btn-outline-primary">Scholastic Record</a>
                          @role('admin|registrar|head registrar')
                            <a href="/students/{{ $user->id }}" class="btn btn-sm btn-outline-secondary">Return</a>
                          @endrole
                        </div>
                        @endrole
                    </div>
                    <div class="row">
                      <div class="col">
                      @role('admin|registrar')
                      <form action="/students/{{ $user->id }}/grades?" method="GET" class="form-horizontal">
                      @else
                      <form action="/student/enlistment?" method="GET" class="form-horizontal">
                      @endrole
                        <label class="form-control-label" for="select_acad_term">Academic Term: </label>
                        <select class="col-12 col-md-4 select2 form-control m-b" name="select_acad_term" onchange="this.form.submit()">
                          @foreach ($acad_terms as $acad_term)
                            @if($selected_acad_term == $acad_term->acad_term_id)
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
                      </form>
                      </div>
                    </div>
                </div>
              @if(count($grades) > 0)
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Class</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-center">Credits</th>
                                <th scope="col" class="text-center">Prelims</th>
                                <th scope="col" class="text-center">Midterms</th>
                                <th scope="col" class="text-center">Finals</th>
                                <th scope="col" class="text-center">Average</th>
                                <th scope="col" class="text-center">Grade</th>
                                <th scope="col" class="text-center">Completion</th>
                                <th scope="col" class="text-center">Note</th>
                                <th scope="col" class="text-center">Remarks</th>
                                <th scope="col" class="text-center">Instructor</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($grades as $grade)
                            <tr>
                              <td scope="row">
                                @role('admin')
                                  <a href="/classes/{{ $grade->sclass->class_id }}">
                                    {{ $grade->sclass->course_code }}
                                    {{ $grade->sclass->section}}
                                  </a>
                                @else
                                  {{ $grade->sclass->course_code }}
                                  {{ $grade->sclass->section}}
                                @endrole
                              </td>
                              <td>{{ $grade->sclass->course->description }}</td>
                              <td class="text-center">
                                  {{ $grade->sclass->course->units }}
                              </td>
                              <td class="text-center">{{ $grade->prelims }}</td>
                              <td class="text-center">{{ $grade->midterms }}</td>
                              <td class="text-center">{{ $grade->finals }}</td>
                              <td class="text-center">{{ $grade->getAverage() }}</td>
                              <td class="text-center">{{ $grade->getGrade() }}</td>
                              <td class="text-center">{{ $grade->getCompletion() }}</td>
                              <td class="text-center">{{ $grade->note }}</td>
                              <td>
                                @if($grade->getRemarks() == 'PASSED')
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i> {{ $grade->getRemarks() }}
                                  </span>
                                @elseif($grade->getRemarks() == 'FAILED')
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-danger"></i> {{ $grade->getRemarks() }}
                                  </span>
                                @elseif($grade->getRemarks() != null)
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i> {{ $grade->getRemarks() }}
                                  </span>
                                @endif
                              </td>
                              <td class="text-center">
                                {{ $grade->sclass->instructor->user->getNameWithTitle() }}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
              @else
                  <div class="row border-1 mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Enlistment found</p>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection