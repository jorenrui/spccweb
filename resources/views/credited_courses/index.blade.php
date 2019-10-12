@extends('layouts.app', ['title' => 'Students'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">
                            Credited Courses | {{ $user->student->getStudentNo() }} {{ $user->getName() }}
                            </h3>
                            <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>
                        <div class="col text-right">
                            <a href="/students/{{ $user->id }}" class="btn btn-sm btn-outline-secondary">Return</a>

                            @role('admin|registrar')
                            @if(count($schools) > 0)
                            <a href="/students/{{ $user->id }}/credited_courses/create" class="btn btn-sm btn-primary">
                              Add School
                            </a>
                            @endif
                            @endrole
                        </div>
                    </div>
                </div>
              @if(count($schools) > 0)
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">School</th>
                                <th scope="col" class="text-center">Total Units Credited</th>
                                @role('admin|registrar')
                                <th scope="col"></th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($schools as $school)
                            <tr>
                                <td class="text-left" scope="row">
                                    <a href="/students/{{ $user->id }}/credited_courses/{{ $school->credit_id }}" class="btn btn-outline-primary btn-sm">
                                      View
                                    </a>
                                </td>
                                <td class="text-center">{{ $school->description }}</td>
                                <td class="text-center">{{ $school->getTotalUnits() }}</td>
                                @role('admin|registrar')
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="/students/{{ $user->id }}/credited_courses/{{ $school->credit_id }}/edit">
                                                Edit
                                            </a>
                                            <form action="{{ action('CreditedCoursesController@destroy', [$user->id, $school->credit_id]) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{ $school->school }}?') ? this.parentElement.submit() : ''">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @endrole
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $schools->links() }}
                </div>
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Credited Courses found</p>
                          <br>
                          @role('admin|registrar')
                          <a href="/students/{{ $user->id }}/credited_courses/create" class="btn btn-primary btn-lg">Add School</a>
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