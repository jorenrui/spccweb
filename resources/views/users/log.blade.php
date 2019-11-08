@extends('layouts.app', ['title' => 'User Activity Log'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid">
        <div class="row mt--4">
            <div class="col">
                <div class="card shadow">
                @if(count($activities) > 0 || $search != null)
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col col-lg-2">
                                <h3 class="mb-0">User Activity Log</h3>
                            </div>

                            <div class="col col-lg-4">
                                <form action="/user/log?" method="get" class="form-horizontal">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-sm pt-0">
                                            <input name="search" class="form-control" placeholder="e.g. K001, faculty, Juan, or 2019-11-10" type="text">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-default" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if($search != null)
                            <div class="col">
                                <a href="/user/log" class="btn btn-outline-secondary btn-sm">
                                    {{ str_limit($search, 20) }}
                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                </a>
                            </div>
                            @endif

                            <div class="col text-right">

                                <form method="POST" action="{{ action('UserController@logDestroyAll') }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete All</button>
                                </form>

                            </div>
                        </div>
                    </div>

                    @if($search != null && count($activities) == 0)
                        <div class="row mt-3 mb-5">
                            <div class="col text-center">
                                <p class="lead">Activity not found</p>
                            </div>
                        </div>
                    @endif

                    @if(count($activities) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="text-center">Timestamp</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td scope="row">
                                              @if($activity->user->hasRole('faculty'))
                                                <a href="/faculties/{{ $activity->user->id }}">
                                                  {{ $activity->user->employee->getEmployeeNo() }}
                                                </a>
                                              @elseif($activity->user->hasRole('student'))
                                                <a href="/faculties/{{ $activity->user->id }}">
                                                    {{ $activity->user->student->getStudentNo() }}
                                                </a>
                                              @else
                                                {{ $activity->user->employee->getEmployeeNo() }}
                                              @endif
                                              {{ $activity->user->getName() }}
                                            </td>
                                            <td style="width:200px; word-break: break-word;">User {{ $activity->description }}</td>
                                            <td class="text-center">{{ $activity->timestamp }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ action('UserController@logDestroy', $activity->activity_id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete this activity?') ? this.parentElement.submit() : ''">
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
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $activities->links() }}
                            </nav>
                        </div>
                    @endif
                @else
                    <div class="row mt-3 mb-5">
                        <div class="col text-center">
                            <p class="lead">No activity found</p>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection