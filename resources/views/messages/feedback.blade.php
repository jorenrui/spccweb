@extends('layouts.app', ['title' => 'Messages'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        @if(count($messages) > 0 || $search != null)
            <div class="row mt-5">
            <div class="col mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col col-lg-3">
                                <h3 class="mb-0">Messages</h3>
                            </div>
                            <div class="col col-lg-6">
                                <form action="/feedback?" method="get" class="form-horizontal">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-sm pt-0">
                                            <input name="search" class="form-control" placeholder="Sender's name, email, or subject of the message" type="text">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-default" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if($search != null)
                            <div class="col">
                                <a href="/feedback" class="btn btn-outline-secondary btn-sm">
                                    {{ str_limit($search, 20) }}
                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </div>

            @if($search != null && count($messages) == 0)
                <div class="row mt-3 mb-5">
                    <div class="col text-center">
                        <p class="lead">Message not found</p>
                    </div>
                </div>
            @endif

            @if(count($messages) > 0)
                @foreach ($messages as $msg)
                <div class="row">
                    <div class="col mt-3 mb-xl-0">
                        <div class="card shadow">
                            <div class="card-body">
                                <form method="POST" action="{{ action('MessagesController@destroy', $msg->message_id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger btn-sm float-right">Delete</button>
                                </form>

                                <h2>Subject: {{ $msg->subject }}</h3>
                                <p class="text-muted text-sm">
                                    From: {{ $msg->name }}
                                    @if($msg->email != null)
                                        ({{ $msg->email }})
                                    @endif
                                    | {{ $msg->getDateCreated() }}
                                </p>
                                <p class="card-text">
                                    {!! str_limit(strip_tags($msg->body), 200) !!}
                                </p>
                                <a href="/messages/{{ $msg->message_id }}" class="text-sm">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row mt-5">
                {{ $messages->links() }}
                </div>
            @endif
        @else
            <div class="row mt-5 mb-5">
                <div class="col text-center">
                    <div class="card shadow">
                        <div class="card-body">
                            <p class="lead">No messages found</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

      @include('layouts.footers.auth')
    </div>
@endsection