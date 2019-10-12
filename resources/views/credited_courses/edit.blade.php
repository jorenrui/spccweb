@extends('layouts.app', ['title' => 'Students'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <h2>Edit School</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('CreditedCoursesController@update', [$user_id, $school->credit_id]) }}">
                          @csrf
                          @method('PUT')

                          <div class="row">
                            <div class="col-12 col-md-6">
                                <label class="form-control-label" for="description">School</label>
                                <input id="description" name="description" class="form-control mb-3" type="text" placeholder="e.g. Technological Institute of the Philippines" value="{{ $school->description }}" required>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Update School</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary" onclick="javascript:history.back()">Cancel</button>
                              </div>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>

      @include('layouts.footers.auth')
    </div>
@endsection