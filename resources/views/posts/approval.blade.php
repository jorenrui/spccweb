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
                                        <th scope="col">Author</th>
                                        <th scope="col">Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td scope="row">

                                                <a href="/posts/mod/{{ $post->post_id }}/publish" class="btn btn-outline-primary btn-sm">
                                                  Publish
                                                </a>

                                                <a href="/posts/{{ $post->post_id }}" class="btn btn-outline-primary btn-sm">
                                                    View
                                                </a>

                                                <form action="{{ action('PostsController@destroy', $post->post_id) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirm('Are you sure you want to delete this post?') ? this.parentElement.submit() : ''">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                              <a href="/posts/{{ $post->post_id }}">
                                                {{ $post->title }}
                                              </a>
                                            </td>
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
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection