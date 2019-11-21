@extends('layouts.app', ['title' => 'Registrar Staff'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($registrars) > 0 || $search != null)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <h3 class="mb-0">Registrar Staff Masterlist</h3>
                        </div>

                        <div class="col col-lg-4">
                            <form action="/archived/registrars?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. K001 or Juan" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($search != null)
                        <div class="col">
                            <a href="/archived/registrars" class="btn btn-outline-secondary btn-sm">
                                {{ str_limit($search, 20) }}
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                @if($search != null && count($registrars) == 0)
                    <div class="row mt-3 mb-5">
                        <div class="col text-center">
                            <p class="lead">Employee not found</p>
                        </div>
                    </div>
                @endif

                @if(count($registrars) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Employee No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Date Employed</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($registrars as $registrar)
                                <tr>
                                    <td scope="row">
                                        <a href="/registrars/{{ $registrar->id }}" class="btn btn-outline-primary btn-sm">
                                            View
                                        </a>
                                    </td>
                                    <td class="text-center">
                                    {{ $registrar->employee->getEmployeeNo() }}
                                    </td>
                                    <td>{{ $registrar->getSortableName() }}</td>
                                    <td class="text-center">
                                        {{ $registrar->employee->getDateEmployed() }}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a href="/registrars/{{ $registrar->id }}/edit" class="dropdown-item">
                                                Edit
                                            </a>

                                            <a href="/registrars/{{ $registrar->id }}/unarchive" class="dropdown-item" onclick="return confirm('Are you sure you want to unarchive Employee {{ $registrar->employee->getEmployeeNo() }} {{ $registrar->getName() }}?')">
                                                Unarchive Registrar
                                            </a>

                                            <form action="{{ action('RegistrarController@destroy', $registrar->id) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete Employee {{ $registrar->employee->getEmployeeNo() }} {{ $registrar->getName() }}? You may want to archive this Employee instead.') ? this.parentElement.submit() : ''">
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
                        {{ $registrars->links() }}
                    </div>
                @endif
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No archived registrar found</p>
                          <br>
                          <a href="/registrars" class="btn btn-primary btn-lg">Return to Registrar Staff Masterlist</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection