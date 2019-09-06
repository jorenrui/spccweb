@extends('layouts.app', ['title' => 'Manage Curriculum'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($courses) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Course Masterlist</h3>
                            <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>
                        <div class="col text-right">
                            <a href="/courses/create" class="btn btn-sm btn-primary">Add Course</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">Course Code</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Credits</th>
                                <th scope="col" class="text-center">Lab Units</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($courses as $course)
                            <tr>
                                <td class="text-left" scope="row">
                                    <a href="/courses/{{ $course->course_code }}/edit" class="btn btn-outline-info btn-sm">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ action('CourseController@destroy', $course->course_code) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td class="text-center">{{ $course->course_code }}</td>
                                <td>{{ $course->description }}</td>
                                <td class="text-center">{{ $course->units }}</td>
                                <td class="text-center">{{ $course->lab_units ? $course->lab_units : '-' }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $courses->links() }}
                </div>
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Course found</p>
                          <br>
                          <a href="/courses/create" class="btn btn-primary btn-lg">Add Course</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection