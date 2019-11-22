@extends('layouts.app', ['title' => 'Manage Curriculum'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($courses) > 0 || $search != null)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-4">
                            <h3 class="mb-0">Course Masterlist</h3>
                            <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>

                        <div class="col col-lg-4">
                            <form action="/courses?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. ADET or Analytics Modeling" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($search != null)
                        <div class="col">
                            <a href="/courses" class="btn btn-outline-secondary btn-sm">
                                {{ str_limit($search, 20) }}
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </a>
                        </div>
                        @endif

                        <div class="col text-right">
                            <a href="/courses/create" class="btn btn-sm btn-primary">Add Course</a>
                        </div>
                    </div>
                </div>

                @if($search != null && count($courses) == 0)
                    <div class="row mt-3 mb-5">
                        <div class="col text-center">
                            <p class="lead">Course not found</p>
                        </div>
                    </div>
                @endif

                @if(count($courses) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Course Code</th>
                                    <th scope="col" class="text-center">Description</th>
                                    <th scope="col" class="text-center">Credits</th>
                                    <th scope="col" class="text-center">Lab Units</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="text-center" scope="row">{{ $course->course_code }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td class="text-center">{{ $course->units }}</td>
                                    <td class="text-center">
                                        {{ $course->lab_units ? $course->lab_units : '-' }}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/courses/{{ $course->course_code }}/edit">
                                                    Edit
                                                </a>
                                                <form action="{{ action('CourseController@destroy', $course->course_code) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{ $course->course_code }}? This will also delete curriculum details associated with this course.') ? this.parentElement.submit() : ''">
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
                        {{ $courses->links() }}
                    </div>
                @endif
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