@extends('layouts.app', ['title' => 'Settings'])

@section('styles')
<link href="{{ asset('vendor/select2-4.0.10/select2.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/select2-4.0.10/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.select2').select2();
});
</script>
@endpush

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-body">
                      <h2>Settings</h2>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('DashboardController@updateSettings') }}">
                          @csrf

                          <div class="row">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label" for="annoucement">Annoucement</label>
                              <input id="annoucement" name="annoucement" class="form-control mb-3" type="text" placeholder="e.g. No classes on Oct. 12 due to the Typhoon" value="{{ $annoucement }}" required>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                              <label class="form-control-label" for="degree">Degree</label>
                              <input id="degree" name="degree" class="form-control mb-3" type="text" placeholder="e.g. Bachelor of Science in Information Technology" value="{{ $degree }}" required>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12 col-lg-4 col-md-6">
                                <label class="form-control-label" for="acad_term_id">Academic Term</label>
                                <select id="acad_term_id" name="acad_term_id" class="select2 form-control m-b" required>
                                  @foreach ($acad_terms as $acad_term)
                                    @if($acad_term->acad_term_id == $cur_acad_term_id)
                                      <option value="{{ $acad_term->acad_term_id }}" selected>
                                        {{ $acad_term->getAcadTerm() }}
                                      </option>
                                    @else
                                    <option value="{{ $acad_term->acad_term_id }}">
                                      {{ $acad_term->getAcadTerm() }}
                                    </option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="row mt-4">
                            <div class="col-12 col-lg-2 col-md-6">
                                <label class="form-control-label" for="curriculum_id">Curriculum</label>
                                <select id="curriculum_id" name="curriculum_id" class="select2 form-control m-b" required>
                                  @foreach ($curriculums as $curriculum)
                                    @if($curriculum->curriculum_id == $cur_curriculum_id)
                                      <option value="{{ $curriculum->curriculum_id }}" selected>
                                        {{ $curriculum->curriculum_id }}
                                      </option>
                                    @else
                                    <option value="{{ $curriculum->curriculum_id }}">
                                      {{ $curriculum->curriculum_id }}
                                    </option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-primary">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Update Settings</span>
                                </button>
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