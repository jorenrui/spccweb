@extends('layouts.app', ['title' => 'Warning'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid">
        <div class="row mt--4">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                      <div class="row">
                        <div class="col text-center">
                            <div class="icon icon-shape bg-danger text-white rounded-circle">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <p class="lead">Please pay the unsettled payment to view your grades.</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection