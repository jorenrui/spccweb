@extends('layouts.app', ['title' => 'Registrar Staff'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($registrars) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Registrar Staff Masterlist</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/registrars/create" class="btn btn-sm btn-primary">Add Registrar</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Employee No</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Username</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Address</th>
                                <th scope="col" class="text-center">Contact No</th>
                                <th scope="col" class="text-center">Gender</th>
                                <th scope="col" class="text-center">Birthdate</th>
                                <th scope="col" class="text-center">Date Employed</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($registrars as $registrar)
                            <tr>
                                <td class="text-center" scope="row">
                                  {{ $registrar->employee->employee_no }}
                                </td>
                                <td>{{ $registrar->getName() }}</td>
                                <td class="text-center">{{ $registrar->username }}</td>
                                <td>{{ $registrar->email }}</td>
                                <td>{{ $registrar->address }}</td>
                                <td class="text-center">{{ $registrar->contact_no }}</td>
                                <td>{{ $registrar->getGender() }}</td>
                                <td class="text-center">{{ $registrar->getBirthdate() }}</td>
                                <td class="text-center">
                                    {{ $registrar->employee->getDateEmployed() }}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="/registrars/{{ $registrar->id }}/edit" class="dropdown-item"">
                                            Edit
                                        </a>

                                        <form method="POST" action="{{ action('RegistrarController@destroy', $registrar->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"  class="dropdown-item">Delete</button>
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
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No registrar found</p>
                          <br>
                          <a href="/registrars/create" class="btn btn-primary btn-lg">Add Registrar</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection