@extends('layouts.app', ['title' => auth()->user()->hasRole('faculty') ? 'View Faculty Load' : 'Encoding of Grades'])

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

$(document).on('keydown', 'input[pattern]', function(e){
  var input = $(this);
  var oldVal = input.val();
  var regex = new RegExp(input.attr('pattern'), 'g');

  setTimeout(function(){
    var newVal = input.val();
    if(!regex.test(newVal)){
      input.val(oldVal);
    }
  }, 0);
});
</script>
@endpush

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col">
                              <h2>Encoding of Grades</h2>
                              <p class="text-muted text-sm">
                                  {{ $sclass->getCourse() }}
                              </p>
                          </div>
                          <div class="col text-right">
                            @role('faculty')
                              <a href="/faculty/load/{{ $sclass->class_id }}" class="btn btn-sm btn-secondary">Return</a>
                            @else
                              <a href="/faculties/{{ $sclass->instructor->user->id }}/load/{{ $sclass->class_id }}" class="btn btn-sm btn-secondary">Return</a>
                            @endrole
                          </div>
                      </div>
                    </div>

                    <form id="form-post" method="POST" action="{{ action('FacultyAccessController@update', $sclass->class_id) }}">
                    @csrf
                    @method('PUT')

                    <input name="class_id" type="text" value="{{ $sclass->class_id }}" style="display:none">

                    <div class="table-responsive">
                        <table class="table table-encode align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                  <th scope="col" class="text-center">Student No.</th>
                                  <th scope="col" class="text-center">Name</th>
                                  <th scope="col" class="text-center input-grade">Prelims</th>
                                  @if(date('Y-m-d') >= $acad_term->midtermsEvent->start_date)
                                    <th scope="col" class="text-center input-grade">Midterms</th>
                                  @endif
                                  @if(date('Y-m-d') >= $acad_term->finalsEvent->start_date)
                                    <th scope="col" class="text-center input-grade">Finals</th>
                                    <th scope="col" class="text-center">Is INC?</th>
                                    <th scope="col" class="text-center input-note">Note</th>
                                  @endif
                                </tr>
                            </thead>
                            <tbody>
                              <?php $id = 0; ?>
                              @foreach ($grades as $grade)
                                <input name="grade_id[]" type="text" value="{{ $grade->grade_id }}" style="display:none">
                                <tr>
                                    <td class="text-center" scope="row">
                                      {{ $grade->student->getStudentNo() }}
                                      <input name="id[]" type="text" value="{{ $id }}" style="display:none;">
                                    </td>
                                    <td>{{ $grade->student->user->getName() }}</td>
                                    <td class="text-center">
                                      @if($grade->prelims != null)
                                        @if($sclass->is_prelims_lock)
                                          <input name="prelims[]" type="text" value="{{ $grade->prelims }}" style="display:none">
                                          <input class="form-control mb-3" type="text" value="{{ $grade->prelims }}" disabled>
                                        @else
                                          <input name="prelims[]" class="form-control mb-3" type="text" placeholder="e.g. 85.00" value="{{ $grade->prelims }}" pattern="^\d{0,2}(\.\d{0,2})?$" >
                                        @endif
                                      @else
                                        <input name="prelims[]" class="form-control mb-3" type="text" placeholder="e.g. 85.00" pattern="^\d{0,2}(\.\d{0,2})?$" >
                                      @endif
                                    </td>
                                  @if(date('Y-m-d') >= $acad_term->midtermsEvent->start_date)
                                    <td class="text-center">
                                      @if($grade->midterms != null)
                                        @if($sclass->is_midterms_lock)
                                          <input name="midterms[]" type="text" value="{{ $grade->midterms }}" style="display:none">
                                          <input class="form-control mb-3" type="text" value="{{ $grade->midterms }}" disabled>
                                        @else
                                          <input name="midterms[]" class="form-control mb-3" type="text" placeholder="e.g. 85.00" value="{{ $grade->midterms }}" pattern="^\d{0,2}(\.\d{0,2})?$">
                                        @endif
                                      @else
                                        <input name="midterms[]" class="form-control mb-3" type="text" placeholder="e.g. 85.00" pattern="^\d{0,2}(\.\d{0,2})?$">
                                      @endif
                                    </td>
                                  @endif
                                  @if(date('Y-m-d') >= $acad_term->finalsEvent->start_date)
                                    <td class="text-center">
                                        @if($grade->finals != null)
                                          @if($sclass->is_finals_lock)
                                            <input name="finals[]" type="text" value="{{ $grade->finals }}" style="display:none">
                                            <input class="form-control mb-3" type="text" value="{{ $grade->finals }}" disabled>
                                          @else
                                            <input name="finals[]" class="form-control mb-3" type="text" placeholder="e.g. 85.00" value="{{ $grade->finals }}"  pattern="^\d{0,2}(\.\d{0,2})?$">
                                          @endif
                                        @else
                                          <input name="finals[]" class="form-control mb-3" type="text" placeholder="e.g. 85.00" pattern="^\d{0,2}(\.\d{0,2})?$">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                      <label class="custom-toggle">
                                        <input name="is_inc[{{$id}}]" type="checkbox" {{ $grade->is_inc ? 'checked' : '' }}>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                      </label>
                                    </td>
                                    <td>
                                      @if($grade->is_inc)
                                        <select name="note[]" class="select2 form-control mb-3" value="{{ $grade->note }}" required>
                                          @if($grade->note != 'Project' && $grade->note != 'Final Exam')
                                            <option value="{{ $grade->note }}">{{ $grade->note }}</option>
                                          @endif
                                          <option value="Project">Project</option>
                                          <option value="Final Exam">Final Exam</option>
                                        </select>
                                      @else
                                        <input name="note[]" type="text" style="display:none">
                                      @endif
                                    </td>
                                  @endif
                                </tr>
                                <?php $id++ ?>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-info">
                          <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                          <span class="btn-inner--text">Save Changes</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick="javascript:history.back()">Cancel</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>

      @include('layouts.footers.auth')
    </div>
@endsection