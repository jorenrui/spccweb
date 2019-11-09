@extends('layouts.app', ['title' => 'Examination Period'])

@push('js')
<script src="{{ asset('argon/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-mask-plugin-1.14.16/jquery.mask.min.js') }}"></script>
@endpush

@section('content')
    @include('layouts.headers.header', ['title' => 'Edit Academic Term'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Academic Term</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/acad_terms" class="btn btn-sm btn-outline-secondary">
                                    Back to list
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-post" method="POST" action="{{ action('AcadTermController@update', $acadTerm->acad_term_id) }}" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('sy') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="sy">School Year</label>
                                    <input type="text" name="sy" id="sy" class="form-control form-control-alternative{{ $errors->has('sy') ? ' is-invalid' : '' }}" placeholder="e.g. 2019-2020" value="{{ old('sy', $acadTerm->sy) }}" data-mask="0000-0000"  data-mask-clearifnotmatch="true" required autofocus>

                                    @if ($errors->has('sy'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col col-lg-4">
                                    <label class="form-control-label" for="semester">
                                        Semester
                                    </label>
                                    <select id="semester" name="semester" class="form-control form-control-alternative m-b" required>
                                        <option value="01" {{ old('semester', $acadTerm->semester) == 1 ? 'selected' : '' }}>First Semester</option>
                                        <option value="02" {{ old('semester', $acadTerm->semester) == 2 ? 'selected' : '' }}>Second Semester</option>
                                        <option value="09" {{ old('semester', $acadTerm->semester) == 9 ? 'selected' : '' }}>Summer</option>
                                    </select>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4 mt-3">
                                Examination Period
                            </h6>
                            <div class="pl-lg-4 row input-daterange datepicker">
                                <div class="form-group{{ $errors->has('prelims_start_date') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="prelims_start_date">
                                        Prelims Examination
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="prelims_start_date" id="prelims_start_date" class="form-control form-control{{ $errors->has('prelims_start_date') ? ' is-invalid' : '' }}" placeholder="Start Date" value="{{ old('prelims_start_date', $acadTerm->prelims_id) != null ? date('m/d/Y',strtotime( old('prelims_start_date', $acadTerm->prelimsEvent->start_date) )) : '' }}">
                                    </div>

                                    @if ($errors->has('prelims_start_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prelims_start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('prelims_end_date') ? ' has-danger' : '' }} col-lg-4 mt-4 pt-2">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="prelims_end_date" id="prelims_end_date" class="form-control form-control{{ $errors->has('prelims_end_date') ? ' is-invalid' : '' }}" placeholder="End Date" value="{{ old('prelims_end_date', $acadTerm->prelims_id) != null ? date('m/d/Y',strtotime( old('prelims_end_date', $acadTerm->prelimsEvent->end_date) )) : '' }}">
                                    </div>

                                    @if ($errors->has('prelims_end_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prelims_end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row input-daterange datepicker">
                                <div class="form-group{{ $errors->has('midterms_start_date') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="midterms_start_date">
                                        Midterms Examination
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="midterms_start_date" id="midterms_start_date" class="form-control form-control{{ $errors->has('midterms_start_date') ? ' is-invalid' : '' }}" placeholder="Start Date" value="{{ old('midterms_start_date', $acadTerm->midterms_id) != null ? date('m/d/Y',strtotime( old('midterms_start_date', $acadTerm->midtermsEvent->start_date) )) : '' }}">
                                    </div>

                                    @if ($errors->has('midterms_start_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('midterms_start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('midterms_end_date') ? ' has-danger' : '' }} col-lg-4 mt-4 pt-2">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="midterms_end_date" id="midterms_end_date" class="form-control form-control{{ $errors->has('midterms_end_date') ? ' is-invalid' : '' }}" placeholder="End Date" value="{{ old('midterms_end_date', $acadTerm->midterms_id) != null ? date('m/d/Y',strtotime( old('midterms_end_date', $acadTerm->midtermsEvent->end_date) )) : '' }}">
                                    </div>

                                    @if ($errors->has('midterms_end_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('midterms_end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row input-daterange datepicker">
                                <div class="form-group{{ $errors->has('finals_start_date') ? ' has-danger' : '' }} col-lg-4">
                                    <label class="form-control-label" for="finals_start_date">
                                        Finals Examination
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="finals_start_date" id="finals_start_date" class="form-control form-control{{ $errors->has('finals_start_date') ? ' is-invalid' : '' }}" placeholder="Start Date" value="{{ old('finals_start_date', $acadTerm->finals_id) != null ? date('m/d/Y',strtotime( old('finals_start_date', $acadTerm->finalsEvent->start_date) )) : '' }}">
                                    </div>

                                    @if ($errors->has('finals_start_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('finals_start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('finals_end_date') ? ' has-danger' : '' }} col-lg-4 mt-4 pt-2">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="finals_end_date" id="finals_end_date" class="form-control form-control{{ $errors->has('finals_end_date') ? ' is-invalid' : '' }}" placeholder="End Date" value="{{ old('finals_end_date', $acadTerm->finals_id) != null ? date('m/d/Y',strtotime( old('finals_end_date', $acadTerm->finalsEvent->end_date) )) : '' }}">
                                    </div>

                                    @if ($errors->has('finals_end_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('finals_end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="pl-lg-4 row mt-4">
                                <div class="col">
                                    <button id="btnSubmit" type="submit" class="btn btn-success">
                                        Update Academic Term
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