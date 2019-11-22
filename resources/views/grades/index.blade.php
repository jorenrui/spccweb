@extends('layouts.app', ['title' => 'Grade Report'])

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
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Class Masterlist</h3>
                            <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-lg-6">
                      <form action="/grades?" method="GET" class="form-horizontal">
                        <label class="form-control-label" for="select_acad_term">Academic Term: </label>
                        <select class="col-7 select2 form-control m-b" name="select_acad_term" onchange="this.form.submit()">
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

                    <div class="row mt-2">
                        <div class="col col-lg-4 col-md-6">
                            <form action="/grades?" method="get" class="form-horizontal">
                                <input type="text" name="select_acad_term"
                                    value="{{ $selected_acad_term }}" style="display:none;"/>
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. IT 401, 401-A or K200" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($search != null)
                        <div class="col">
                            <a href="/grades" class="btn btn-outline-secondary btn-sm">
                                {{ str_limit($search, 20) }}
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </a>
                        </div>
                        @endif

                        @if($selected_acad_term >= $cur_acad_term &&
                            auth()->user()->hasRole('admin') &&
                            count($classes) > 0)
                          <div class="col text-right">
                              <a href="/classes/create" class="btn btn-sm btn-primary">Add Class</a>
                          </div>
                        @endif
                    </div>
                </div>
              @if(count($classes) > 0)
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">Class</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-center">Instructor</th>
                                <th scope="col" class="text-center">Total Students</th>
                                @role('admin|head registrar')
                                <th scope="col"></th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($classes as $sclass)
                            <tr>
                              <td class="text-left" scope="row">
                                  <a href="/grades/{{ $sclass->class_id }}" class="btn btn-outline-primary btn-sm">
                                      View
                                  </a>
                              </td>
                              <td class="text-center">
                                {{ $sclass->course_code }}
                                {{ $sclass->section }}
                              </td>
                              <td>{{ $sclass->course->description }}</td>
                              <td>
                                {{ $sclass->instructor->getEmployeeNo() }}
                                {{ $sclass->instructor->user->getNameWithTitle() }}
                              </td>
                              <td class="text-center">
                                  {{ $sclass->getTotalStudents() }}
                              </td>
                              @role('admin|head registrar')
                              <td class="text-right">
                                <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="/classes/{{ $sclass->class_id }}/edit" class="dropdown-item"">
                                        Edit
                                    </a>

                                    <form action="{{ action('SClassController@destroy', $sclass->class_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{ $sclass->course_code }} class? This will also delete all the grades associated to this class.') ? this.parentElement.submit() : ''">
                                            Delete
                                        </button>
                                    </form>
                                  </div>
                                </div>
                                @endrole
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
                          @if($selected_acad_term >= $cur_acad_term && auth()->user()->hasRole('admin'))
                          <br>
                          <a href="/classes/create" class="btn btn-primary btn-lg">Add Class</a>
                          @endif
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection