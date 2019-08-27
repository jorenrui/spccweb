@extends('layouts.app', ['title' => 'Manage Curriculum'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <h2>Add Curriculum</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('CurriculumController@store') }}">
                          @csrf

                          <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="curriculum_id">Curriculum ID</label>
                                <input id="curriculum_id" name="curriculum_id" class="form-control mb-3" type="text" placeholder="e.g. 2019" required>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="effective_sy">Effective S.Y.</label>
                                <input id="effective_sy" name="effective_sy" class="form-control mb-3" type="text" placeholder="e.g. 2019-2020" required>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Add Curriculum</span>
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