@extends('layouts.app', ['title' => 'Approval of Posts'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    @if(count($posts) > 0)
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Unpublished Posts</h3>
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

                                                <a href="/posts/mod/{{ $post->post_id }}/publish" class="btn btn-outline-primary btn-sm">
                                                  Publish
                                                </a>

                                                <form method="POST" action="{{ action('PostsController@destroy', $post->post_id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>

                                            </td>
                                            <th scope="row">
                                              <a href="/posts/{{ $post->post_id }}">
                                                {{ $post->title }}
                                              </a>
                                            </th>
                                            <th>
                                                {!! str_limit(strip_tags($post->body), 50) !!}
                                            </th>
                                            <td>{{ $post->user->getName() }}</td>
                                            <td>{{ $post->created_at->format('M d, Y') }}</td>
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
        </div>
    </div>
@endsection