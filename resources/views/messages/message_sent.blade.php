@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Message Sent!</small>
                        </div>
                        <p>
                          Thank you for sending us a message. We received your message and will begin processing it soon.
                        </p>
                    </div>
                </div>

                <div class="row mt-3">
                  <div class="col ">
                      <a href="/" class="text-light">
                          <small>Return Home</small>
                      </a>
                  </div>
              </div>
            </div>
        </div>
    </div>
@endsection