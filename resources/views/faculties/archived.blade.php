@extends('layouts.app', ['title' => 'Faculty'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

            @if(count($faculties) > 0 || $search != null)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-12">
                            <h3 class="mb-0">Archived Faculty Masterlist</h3>
                            <p class="text-muted text-sm">
                                Archived faculties will not be included in the list of instructors in Class Scheduling.
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col col-lg-4">
                            <form action="/archived/faculties?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. K519 or Juan" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($search != null)
                        <div class="col">
                            <a href="/archived/faculties" class="btn btn-outline-secondary btn-sm">
                                {{ str_limit($search, 20) }}
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                @if($search != null && count($faculties) == 0)
                    <div class="row mt-3 mb-5">
                        <div class="col text-center">
                            <p class="lead">Employee not found</p>
                        </div>
                    </div>
                @endif

                @if(count($faculties) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Employee No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Date Employed</th>
                                    <th scope="col" class="text-center">Total Classes Handled</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($faculties as $faculty)
                                <tr>
                                    <td class="text-right" scope="row">
                                    <a href="/faculties/{{ $faculty->id }}" class="btn btn-outline-primary btn-sm">
                                        View
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {{ $faculty->employee->getEmployeeNo() }}
                                    </td>
                                    <td>{{ $faculty->getSortableName() }}</td>
                                    <td class="text-center">
                                        {{ $faculty->employee->getDateEmployed() }}
                                    </td>
                                    <td class="text-center">
                                        {{ $faculty->employee->getTotalHandledClasses() }}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a href="/faculties/{{ $faculty->id }}/edit" class="dropdown-item">
                                                    Edit
                                                </a>

                                                <a href="/faculties/{{ $faculty->id }}/unarchive" class="dropdown-item" onclick="return confirm('Are you sure you want to unarchive Employee {{ $faculty->employee->getEmployeeNo() }} {{ $faculty->getName() }}?')">
                                                    Unarchive Faculty
                                                </a>

                                                <form action="{{ action('FacultyController@destroy', $faculty->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete Employee {{ $faculty->employee->getEmployeeNo() }} {{ $faculty->getName() }}? Doing this will also delete the classes associated with this account. You may want to archive this Employee instead.') ? this.parentElement.submit() : ''">
                                                      Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $faculties->links() }}
                    </div>
                @endif
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No archived faculty found</p>
                          <br>
                          <a href="/faculties" class="btn btn-primary btn-lg">
                            Return to Faculty Masterlist
                          </a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection