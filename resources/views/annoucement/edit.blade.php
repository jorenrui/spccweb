@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <h2>Edit Annoucement</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('DashboardController@updateAnnoucement') }}">
                          @csrf
                          @method('POST')

                          <div class="row">
                            <div class="col-12">
                                <label class="form-control-label" for="annoucement">Annoucement</label>
                                <input id="annoucement" name="annoucement" class="form-control mb-3" type="text" placeholder="e.g. No Classes on Oct. 10 due to the Typhoon" value="{{ $annoucement }}" required>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Update Annoucement</span>
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