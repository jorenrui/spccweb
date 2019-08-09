@extends('layouts.app', ['title' => 'Posts'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Why our world would end if new technologies disappeared</h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit...
                      </p>
                      <p><small>Written by Joeylene Rivera | Jul 23, 2019</small></p>
                      <div class="button-group row">
                        <div class="col-8">
                          <a href="#" class="btn btn-outline-primary btn-sm">View</a>
                          <a href="#" class="btn btn-outline-info btn-sm">Edit</a>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Why our world would end if new technologies disappeared</h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit...
                      </p>
                      <p><small>Written by Joeylene Rivera | Jul 23, 2019</small></p>
                      <div class="button-group row">
                        <div class="col-8">
                          <a href="#" class="btn btn-outline-primary btn-sm">View</a>
                          <a href="#" class="btn btn-outline-info btn-sm">Edit</a>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Why our world would end if new technologies disappeared</h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit...
                      </p>
                      <p><small>Written by Joeylene Rivera | Jul 23, 2019</small></p>
                      <div class="button-group row">
                        <div class="col-8">
                          <a href="#" class="btn btn-outline-primary btn-sm">View</a>
                          <a href="#" class="btn btn-outline-info btn-sm">Edit</a>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection