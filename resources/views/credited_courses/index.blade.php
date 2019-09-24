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
                            Credited Courses | {{ $user->student->student_no }} {{ $user->getName() }}
                            </h3>
                            <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>
                        <div class="col text-right">
                            <a href="/students/{{ $user->id }}" class="btn btn-sm btn-outline-secondary">Return</a>
                            <a href="/students/{{ $user->id }}/credited_courses/create" class="btn btn-sm btn-primary">
                              Add School
                            </a>
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
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($schools as $school)
                            <tr>
                                <td class="text-left" scope="row">
                                    <a href="/students/{{ $user->id }}/credited_courses/{{ $school->credit_id }}" class="btn btn-outline-primary btn-sm">
                                      View
                                    </a>

                                    <a href="/students/{{ $user->id }}/credited_courses/{{ $school->credit_id }}/edit" class="btn btn-outline-info btn-sm">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ action('CreditedCoursesController@destroy', [$user->id, $school->credit_id]) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td class="text-center">{{ $school->school }}</td>
                                <td class="text-center">{{ $school->getTotalUnits() }}</td>
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
                          <a href="/students/{{ $user->id }}/credited_courses/create" class="btn btn-primary btn-lg">Add School</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection