@extends('layouts.app', ['title' => auth()->user()->employee->employee_no == $grade->sclass->instructor_id ? 'Faculty Load' : 'Grade Report'])

@section('styles')
<link href="{{ asset('vendor/select2-4.0.10/select2.min.css') }}" rel="stylesheet">
@endsection

@push('js')
<script src="{{ asset('vendor/select2-4.0.10/select2.full.min.js') }}"></script>

<script>
$(document).ready(function() {
  $('.select2').select2({
    tags: true
  });
});
</script>
@endpush

@section('content')
    @include('layouts.headers.header', ['title' => 'Completion Grade'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Completion Grade</h3>
                                <p class="text-muted text-md">
                                  {{ $grade->sclass->getCourse() }} |
                                  {{ $grade->student->getStudentNo() }}
                                  {{ $grade->student->user->getName() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-post" method="POST" action="{{ action('GradeController@storeCompletionGrade', $grade->grade_id) }}">
                            @csrf
                            @method('PUT')

                            <div class="pl-lg-4 row mt-4">
                              <div class="form-group col row">
                                <div class="ml-3 form-control-label pt-1">
                                  Completion Grade
                                </div>
                                <div class="ml-3 custom-control custom-radio mb-3">
                                  <input name="grade" class="custom-control-input" id="grade1" type="radio" value="3.00" {{ old('grade') == '3.00' || old('grade') == null ? 'checked' : '' }}>
                                  <label class="custom-control-label" for="grade1">3.00</label>
                                </div>
                                <div class="ml-3 custom-control custom-radio mb-3">
                                  <input name="grade" class="custom-control-input" id="grade2" type="radio" value="5.00" {{ old('grade') == '5.00' ? 'checked' : '' }}>
                                  <label class="custom-control-label" for="grade2">5.00</label>
                                </div>
                              </div>
                            </div>

                            <div class="pl-lg-4 row">
                                <div class="col-12 col-lg-4 col-md-6">
                                    <label class="form-control-label" for="note">Note</label>
                                    <select name="note" class="select2 form-control m-b" value="{{ old('note') }}" required>
                                        <option value="Project">Project</option>
                                        <option value="Final Exam">Final Exam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pl-lg-4 row mt-4">
                                <div class="form-group col row">
                                </div>
                            </div>

                            <div class="pl-lg-4 row mt-4">
                                <div class="col">
                                    <button id="btnSubmit" type="submit" class="btn btn-success">
                                        Save Completion Grade
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