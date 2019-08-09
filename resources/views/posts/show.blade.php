@extends('layouts.app', ['title' => 'Show Post'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title mb-2">{{ $post->title }}</h1>
                        <h5 class="mb-4">Written by Joeylene Rivera</h5>
                        <div class="card-text">
                            {!! $post->body !!}
                        </div>
                        <hr>
                        <p>
                            Created on {{ $post->created_at->format('g:iA M d, Y') }}
                            | Updated on {{ $post->created_at->format('g:iA M d, Y') }}
                        </p>
                        <div class="button-group row mt-5">
                            <div class="col-4">
                                <a href="/posts" class="btn btn-outline-primary">Return</a>
                            </div>
                            <div class="col-8 text-right">
                                <a href="/posts/{{$post->post_id}}/edit" class="btn btn-outline-info">Edit</a>
                                <form method="POST" action="{{ action('PostsController@destroy', $post->post_id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection