@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    @include('layouts.headers.cards')

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
                                <div class="col text-right">
                                    <a href="/posts" class="btn btn-sm btn-primary">See my posts</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-right">
                                                <a href="/posts/{{ $post->post_id }}" class="btn btn-outline-primary btn-sm">
                                                    <span class="btn-inner--icon"><i class="ni ni-folder-17"></i></span>
                                                    <span class="btn-inner--text">View</span>
                                                </a>
                                            </td>
                                            <th scope="row">
                                                {{ $post->title }}
                                            </th>
                                            <th>
                                                {!! str_limit(strip_tags($post->body), 50) !!}
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
                                <br>
                                <a href="/posts/create" class="btn btn-primary btn-lg">Create Post</a>
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
                                <br>
                                <a href="/events/create" class="btn btn-primary btn-lg">Create Event</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection