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
    @include('layouts.headers.exam_cards')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-md-8">
                          <h3 class="mb-0">
                            Student's Enlistment | {{ $user->student->getStudentNo() }} {{ $user->getName()}}
                          </h3>
                          <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>

                        <div class="col text-right">
                          <a href="/students/{{ $user->id }}" class="btn btn-sm btn-outline-secondary">Return</a>

                          @if($selected_acad_term >= $cur_acad_term &&
                              auth()->user()->hasRole('admin') &&
                              count($grades) > 0 &&
                              $user->student->is_paid &&
                              $user->student->getDateGraduated() == null)
                            <a href="/students/{{ $user->id }}/enlist" class="btn btn-sm btn-outline-primary">
                              Enlist Course
                            </a>
                          @endif
                        </div>
                    </div>
                    <div class="row">
                      <div class="col">
                      <form action="/students/{{ $user->id }}/enlistment?" method="GET" class="form-horizontal">
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
                                @if($selected_acad_term >= $cur_acad_term && auth()->user()->hasRole('admin'))
                                <th scope="col"></th>
                                @endif
                                <th scope="col" class="text-center">Class</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-center">Credits</th>
                                <th scope="col" class="text-center">Instructor</th>
                                <th scope="col">Credited Curriculum</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($grades as $grade)
                            <tr>
                              @if($selected_acad_term >= $cur_acad_term && auth()->user()->hasRole('admin'))
                              <td scope="row">
                                  <form method="POST" action="{{ action('StudentController@dropClass', $grade->grade_id) }}" style="display: inline;">
                                      @csrf
                                      @method('DELETE')

                                      <button type="submit" class="btn btn-outline-warning btn-sm">Drop</button>
                                  </form>
                              </td>
                              @endif
                              <td class="text-center">
                                {{ $grade->sclass->course_code }}
                                @if($grade->sclass->section != null)
                                   {{ $grade->sclass->section }}
                                @endif
                              </td>
                              <td>{{ $grade->sclass->course->description }}</td>
                              <td class="text-center">
                                  {{ $grade->sclass->course->units }}
                              </td>
                              <td class="text-center">
                                {{ $grade->sclass->instructor->user->getNameWithTitle() }}
                              </td>
                              <td>
                                <a href="/curriculums/{{ $grade->curriculumDetails->curriculum_id }}">
                                  {{ $grade->curriculumDetails->curriculum_id }} {{ $grade->curriculumDetails->course->course_code}}
                                </a>
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

                          @role('admin')
                          @if($user->student->getDateGraduated() == null &&
                              $user->student->is_paid)
                            <a href="/students/{{ $user->id }}/enlist" class="btn btn-primary">
                              Enlist Course
                            </a>
                          @endif
                          @endrole
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection