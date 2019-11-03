@extends('layouts.app', ['title' => 'Messages'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title mb-2">
                          Subject: {{ $msg->subject }}
                        </h1>
                        <p class="text-muted text-sm">
                          From: {{ $msg->name }}
                          @if($msg->email != null)
                              ({{ $msg->email }})
                          @endif
                          | {{ $msg->getDateCreated() }}
                        </p>
                        <div class="card-text">
                            {!! $msg->body !!}
                        </div>
                        <div class="button-group row mt-5">
                            <div class="col-4">
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="javascript:history.back()">Return</button>
                            </div>
                            <div class="col-8 text-right">
                                <form method="POST" action="{{ action('MessagesController@destroy', $msg->message_id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
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