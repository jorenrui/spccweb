@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    @role('admin|registrar')
        @include('layouts.headers.cards')
    @else
        @include('layouts.headers.annoucement')
    @endrole

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    @if(count($posts) > 0)
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Lastest News</h3>
                                </div>
                                @role('admin|writer')
                                <div class="col text-right">
                                    <a href="/posts" class="btn btn-sm btn-primary">See my posts</a>
                                </div>
                                @endrole
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date Written</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">
                                                <a href="/posts/{{ $post->post_id }}">
                                                    {{ $post->title }}
                                                </a>
                                            </th>
                                            <td>{{ $post->user->getName() }}</td>
                                            <td>{{ $post->getDateCreated() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="row mt-3 mb-5">
                            <div class="col text-center">
                                <p class="lead">No posts found</p>
                                @role('admin|writer')
                                <br>
                                <a href="/posts/create" class="btn btn-primary btn-lg">Create Post</a>
                                @endrole
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    @if(count($events) > 0)
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Events</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="/events" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Event Title</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <th scope="row">
                                            {{ $event->title }}
                                        </th>
                                        <td>{{ $event->getDate() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="row mt-3 mb-5">
                            <div class="col text-center">
                                <p class="lead">No events found</p>
                                @role('admin')
                                <br>
                                <a href="/events/create" class="btn btn-primary btn-lg">Create Event</a>
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