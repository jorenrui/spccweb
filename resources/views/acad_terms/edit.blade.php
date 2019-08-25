@extends('layouts.app', ['title' => 'Edit Academic Term'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <form id="form-post" method="POST" action="{{ action('AcadTermController@update', $acadTerm->acad_term_id) }}">
                        @csrf
                        @method('PUT')

                          <div class="row">
                            <div class="col-12 col-lg-3 col-sm-6">
                                <label class="form-control-label" for="sy">School Year</label>
                            <input id="sy" name="sy" class="form-control mb-3" type="text" placeholder="e.g. 2019-2020" value="{{ $acadTerm->sy }}" required>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-3 col-sm-6">
                                <label class="form-control-label" for="semester">Semester</label>
                            <select id="semester" name="semester" class="form-control m-b" required>
                                    <option value="01" {{ $acadTerm->semester == 1 ? 'selected' : ''}}>First Semester</option>
                                    <option value="02" {{ $acadTerm->semester == 2 ? 'selected' : ''}}>Second Semester</option>
                                </select>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Update Academic Term</span>
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