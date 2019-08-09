@extends('layouts.app', ['title' => 'Show Post'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Why our world would end if new technologies disappeared</h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium facilis nemo rerum debitis fuga...
                      </p>
                      <hr>
                      <p><small>Written by Joeylene Rivera | Jul 23, 2019</small></p>
                      <div class="button-group row">
                          <div class="col-4">
                            <a href="/posts" class="btn btn-outline-primary">Return</a>
                          </div>
                          <div class="col-8 text-right">
                              <a href="#" class="btn btn-outline-info">Edit</a>
                              <a href="#" class="btn btn-outline-danger">Delete</a>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection