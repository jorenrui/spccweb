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
                                    <a href="/posts" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date Published</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">
                                                {{ $post->title }}
                                            </th>
                                            <td>Joeylene Rivera</td>
                                            <td>{{ $post->created_at->format('M d, Y') }}</td>
                                            <td class="text-right">
                                                <a href="/posts/{{ $post->post_id }}" class="btn btn-outline-primary btn-sm">
                                                    <span class="btn-inner--icon"><i class="ni ni-folder-17"></i></span>
                                                    <span class="btn-inner--text">View</span>
                                                </a>
                                            </td>
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
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Start of Enrollment
                                    </th>
                                    <td>
                                        Jan 1, 2019
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        End of Enrollment
                                    </th>
                                    <td>
                                        Jan 8, 2019
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection