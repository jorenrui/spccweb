@extends('layouts.app', ['title' => auth()->user()->hasRole('faculty') ? 'View Faculty Load' : 'Faculty'])

@push('js')
<script type="text/javascript">
  $(document).ready(function() {
      let intervalFunc = function () {
          let file_path = $('#sog_file').val().split('\\');
          $('#browse-file').html(file_path[file_path.length - 1]);
      };

      $('#sog_file').on('click', function () {
          setInterval(intervalFunc, 1);
      });
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
                    <h2>Upload Summary of Grades</h2>
                    <h3>{{ $sclass->getCourse() }}</h3>
                      <hr>
                      <form id="form-post" method="POST" action="{{ action('FileSummaryOfGrades@store', [$sclass->class_id, $period]) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="row">
                            <div class="col-12 col-lg-5">
                              <div class="form-control-label mb-2">
                                Summary of Grades
                              </div>
                              <div class="form-group">
                                  <label id="browse-file" for="sog_file" class="btn btn-outline-default">Choose PDF File</label>
                                  <input type="file" id="sog_file" name="sog_file" style="display: none" accept="application/pdf" required>
                              </div>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                  <span class="btn-inner--text">Upload File</span>
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