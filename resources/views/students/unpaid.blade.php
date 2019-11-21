@extends('layouts.app', ['title' => 'Students'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

            @if(count($students) > 0 || $search != null)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <h3 class="mb-0">Unpaid Students</h3>
                        </div>

                        <div class="col col-lg-4">
                            <form action="/unpaid/students?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. 041322078 or Juan" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($search != null)
                        <div class="col">
                            <a href="/unpaid/students" class="btn btn-outline-secondary btn-sm">
                                {{ str_limit($search, 20) }}
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                @if($search != null && count($students) == 0)
                    <div class="row mt-3 mb-5">
                        <div class="col text-center">
                            <p class="lead">Student not found</p>
                        </div>
                    </div>
                @endif

                @if(count($students) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush {{ count($students) < 5 ? 'mb-6' : ''}}">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Student No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Student Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td class="text-right" scope="row">
                                        <a href="/students/{{ $student->user->id }}" class="btn btn-outline-primary btn-sm">
                                            View
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {{ $student->getStudentNo() }}
                                    </td>
                                    <td>{{ $student->user->getSortableName() }}</td>
                                    <td class="text-center">
                                        {{ $student->getStudentType() }}
                                    </td>
                                    <td>
                                    @if($student->getStatus() == 'Graduate')
                                        <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i> Graduate
                                        </span>
                                    @elseif($student->getStatus() == 'Enrolled')
                                        <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i> Enrolled
                                        </span>
                                    @else
                                        <span class="badge badge-dot mr-4">
                                        <i class="bg-default"></i> Inactive
                                        </span>
                                    @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a href="/students/{{ $student->user->id }}/edit" class="dropdown-item"">
                                                    Edit
                                                </a>

                                                <form action="{{ action('StudentController@destroy', $student->user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{ $student->user->getName() }}?') ? this.parentElement.submit() : ''">
                                                        Delete
                                                    </button>
                                                </form>

                                                <a href="/students/{{ $student->user->id }}/paid" class="dropdown-item"">
                                                    Set as Paid Student
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $students->links() }}
                    </div>
                @endif
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No unpaid student found</p>
                          <br>
                          <a href="/students" class="btn btn-primary btn-lg">Return to Students List</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection