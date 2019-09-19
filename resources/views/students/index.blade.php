@extends('layouts.app', ['title' => 'Students'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($students) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Student Masterlist</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/students/create" class="btn btn-sm btn-primary">Add Student</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
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
                                <td class="text-center" scope="row">
                                    <a href="/students/{{ $student->id }}">
                                        {{ $student->student->student_no }}
                                    </a>
                                </td>
                                <td>{{ $student->getName() }}</td>
                                <td class="text-center">
                                    {{ $student->student->student_type }}
                                </td>
                                <td>
                                @if($student->student->getStatus() == 'Graduate')
                                    <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i> Graduate
                                    </span>
                                @elseif($student->student->getStatus() == 'Enrolled')
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
                                        <a href="/students/{{ $student->id }}/edit" class="dropdown-item"">
                                            Edit
                                        </a>

                                        <form method="POST" action="{{ action('StudentController@destroy', $student->id) }}" style="display: inline;">
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
                    {{ $students->links() }}
                </div>
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No student found</p>
                          <br>
                          <a href="/students/create" class="btn btn-primary btn-lg">Add Student</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection