@extends('layouts.app', ['title' => 'Examination Period'])

@push('js')
  <script src="{{ asset('argon/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <h2>Add Academic Term</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('AcadTermController@store') }}">
                          @csrf

                          <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="sy">School Year</label>
                                <input id="sy" name="sy" class="form-control mb-3" type="text" placeholder="e.g. 2019-2020" required>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="semester">Semester</label>
                                <select id="semester" name="semester" class="form-control m-b" required>
                                    <option value="01" selected>First Semester</option>
                                    <option value="02">Second Semester</option>
                                </select>
                            </div>
                          </div>

                          <h3 class="mt-5">Examination Period</h3>

                          <!-- Prelims Examination -->
                          <div class="row mt-4">
                            <div class="col-12">
                              <h4>Prelims Examination</h4>
                            </div>

                            <div class="row col-lg-7 col-md-10 col-sm-12 input-daterange datepicker align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input id="prelims_start_date" name="prelims_start_date" class="form-control" type="text" placeholder="Start Date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input id="prelims_end_date" name="prelims_end_date" class="form-control" type="text" placeholder="End Date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <!-- end Prelims Examination -->

                          <!-- Midterms Examination -->
                          <div class="row">
                            <div class="col-12">
                              <h4>Midterms Examination</h4>
                            </div>

                            <div class="row col-lg-7 col-md-10 col-sm-12 input-daterange datepicker align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input id="midterms_start_date" name="midterms_start_date" class="form-control" type="text" placeholder="Start Date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input id="midterms_end_date" name="midterms_end_date" class="form-control" type="text" placeholder="End Date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <!-- end Midterms Examination -->

                          <!-- Finals Examination -->
                          <div class="row">
                            <div class="col-12">
                              <h4>Finals Examination</h4>
                            </div>

                            <div class="row col-lg-7 col-md-10 col-sm-12 input-daterange datepicker align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input id="finals_start_date" name="finals_start_date" class="form-control" type="text" placeholder="Start Date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input id="finals_end_date" name="finals_end_date" class="form-control" type="text" placeholder="End Date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <!-- end Finals Examination -->

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Add Academic Term</span>
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