@extends('layouts.app', ['title' => 'User Management'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid">
        <div class="row mt--4">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col col-lg-2">
                                <h3 class="mb-0">Users Masterlist</h3>
                            </div>

                            <div class="col col-lg-4">
                                <form action="/user?" method="get" class="form-horizontal">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-sm pt-0">
                                            <input name="search" class="form-control" placeholder="e.g. username, faculty or Juan" type="text">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-default" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if($search != null)
                            <div class="col">
                                <a href="/user" class="btn btn-outline-secondary btn-sm">
                                    {{ str_limit($search, 20) }}
                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                </a>
                            </div>
                            @endif

                            <div class="col text-right">
                                <a href="/user/create/student" class="btn btn-sm btn-outline-primary">
                                    Add Student
                                </a>
                                <a href="/user/create/employee" class="btn btn-sm btn-outline-primary">
                                    Add Employee
                                </a>
                            </div>
                        </div>
                    </div>

                    @if($search != null && count($users) == 0)
                        <div class="row mt-3 mb-5">
                            <div class="col text-center">
                                <p class="lead">User not found</p>
                            </div>
                        </div>
                    @endif

                    @if(count($users) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush {{ count($users) < 5 ? 'mb-6' : ''}}">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-center">Username</th>
                                        <th scope="col">Role(s)</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Creation Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">
                                                @if($user->hasRole('student'))
                                                    <a href="/user/show/students/{{ $user->id }}" class="btn btn-outline-primary btn-sm">
                                                        View
                                                    </a>
                                                @else
                                                    <a href="/user/show/employees/{{ $user->id }}" class="btn btn-outline-primary btn-sm">
                                                        View
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $user->username }}</td>
                                            <td>{{ $user->getRole() }}</td>
                                            <td>{{ $user->getSortableName() }}</td>
                                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($user->id != auth()->id())
                                                            @if($user->hasRole('student'))
                                                                <a class="dropdown-item" href="/user/edit/students/{{ $user->id }}">
                                                                    Edit
                                                                </a>
                                                            @else
                                                                <a class="dropdown-item" href="/user/edit/employees/{{ $user->id }}">
                                                                    Edit
                                                                </a>
                                                            @endif

                                                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit</a>
                                                        @endif

                                                        @if(($user->hasRole('student') ||
                                                            $user->hasRole('faculty')) &&
                                                            !$user->hasRole('writer'))
                                                            <a class="dropdown-item" href="/users/{{ $user->id }}/set_writer">
                                                                Set as Writer
                                                            </a>
                                                        @elseif(($user->hasRole('student') ||
                                                                $user->hasRole('faculty')) &&
                                                                $user->hasRole('writer'))
                                                            <a class="dropdown-item" href="/users/{{ $user->id }}/unset_writer">
                                                                Unset as Writer
                                                            </a>
                                                        @endif

                                                        @if($user->hasRole('faculty') &&
                                                            !$user->hasRole('moderator'))
                                                            <a class="dropdown-item" href="/users/{{ $user->id }}/set_moderator">
                                                                Set as Moderator</a>
                                                        @elseif($user->hasRole('faculty') &&
                                                                $user->hasRole('moderator'))
                                                            <a class="dropdown-item" href="/users/{{ $user->id }}/unset_moderator">
                                                                Unset as Moderator
                                                            </a>
                                                        @endif

                                                        @if($user->hasRole('faculty') &&
                                                            !$user->hasRole('admin'))
                                                            <a class="dropdown-item" href="/users/{{ $user->id }}/set_admin">
                                                                Set as Admin</a>
                                                        @elseif($user->hasRole('faculty') &&
                                                                $user->hasRole('admin'))
                                                            <a class="dropdown-item" href="/users/{{ $user->id }}/unset_admin">
                                                                Unset as Admin
                                                            </a>
                                                        @endif
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
                                {{ $users->links() }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection