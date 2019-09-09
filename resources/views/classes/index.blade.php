@extends('layouts.app', ['title' => 'Class Scheduling'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($classes) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Class Masterlist</h3>
                            <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>
                        <div class="col text-right">
                            <a href="/classes/create" class="btn btn-sm btn-primary">Add Class</a>
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
                                <th scope="col" class="text-center">Section</th>
                                <th scope="col" class="text-center">Credits</th>
                                <th scope="col" class="text-center">Schedule</th>
                                <th scope="col" class="text-center">Instructor</th>
                                @role('admin')
                                <th scope="col"></th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($classes as $sclass)
                            <tr>
                              <td class="text-left" scope="row">
                                  <a href="/classes/{{ $sclass->class_id }}/show" class="btn btn-outline-info btn-sm">
                                      View
                                  </a>
                              </td>
                              <td class="text-center">{{ $sclass->course->course_code }}</td>
                              <td>{{ $sclass->course->description }}</td>
                              <td class="text-center">{{ $sclass->section }}</td>
                              <td class="text-center">{{ $sclass->course->units }}</td>
                              <td class="text-center">{{ $sclass->getSchedule() }}</td>
                              <td class="text-center">{{ $sclass->instructor->user->getNameWithTitle() }}</td>
                              @role('admin')
                              <td class="text-right">
                                <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="/classes/{{ $sclass->class_id }}/edit" class="dropdown-item"">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ action('SClassController@destroy', $sclass->class_id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"  class="dropdown-item">Delete</button>
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
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Class found</p>
                          <br>
                          <a href="/classes/create" class="btn btn-primary btn-lg">Add Class</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection