@extends('layouts.app', ['title' => 'View Faculty Load'])

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
                        <div class="col">
                          <h3 class="mb-0">
                            Faculty Load | {{ auth()->user()->employee->employee_no }} {{ auth()->user()->getName()}}
                          </h3>
                          <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col">
                      <form action="/faculty/load?" method="GET" class="form-horizontal">
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
              @if(count($classes) > 0)
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">Course Code</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-center">Section</th>
                                <th scope="col" class="text-center">Room</th>
                                <th scope="col" class="text-center">Schedule</th>
                                <th scope="col" class="text-center">Total Students</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($classes as $sclass)
                            <tr>
                              <td class="text-left" scope="row">
                                  <a href="/faculty/load/{{ $sclass->class_id }}" class="btn btn-outline-info btn-sm">
                                      View
                                  </a>
                              </td>
                              <td class="text-center">{{ $sclass->course_code }}</td>
                              <td>{{ $sclass->course->description }}</td>
                              <td class="text-center">
                                {{ $sclass->section != null ? $sclass->section : '-' }}
                              </td>
                              <td class="text-center">
                                {{ $sclass->room != null ? $sclass->room : '-' }}
                              </td>
                              <td class="text-center">
                                {{ $sclass->getSchedule() }}
                              </td>
                              <td class="text-center">
                                  {{ $sclass->getTotalStudents() }}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $classes->links() }}
                </div>
              @else
                  <div class="row border-1 mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Class found</p>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection