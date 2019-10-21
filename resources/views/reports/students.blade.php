@extends('layouts.app', ['title' => auth()->user()->hasRole('faculty') ? 'View Faculty Load' : 'Class Scheduling'])

@section('styles')
<link href="{{ asset('css/print/students.css') }}" rel="stylesheet" media="print">
@endsection

@push('js')
<script type="text/javascript">
    $('.btn-print').click(function() {
        window.print();
    });
</script>
@endpush

@section('content')

@include('layouts.headers.plain')

<div class="container-fluid mt--7">

  <div class="row mt-5 card-row">
    <div class="col-12 mb-5 mb-xl-0">
      <div class="card shadow card-curriculum">
        <div class="card-body row align-items-center">
          <div class="col">
            <h2 class="text-center mt-0">
              SYSTEMS PLUS COMPUTER COLLEGE
              <br>
              <span class="text-sm">Caloocan Campus</span>
            </h2>
            <h3 class="text-center mt-4 mb-4">
              {{ $sclass->getCourse() }}
              <br>
              <span class="text-sm">Instructor: {{ $sclass->instructor->user->getNameWithTitle() }}</span>
            </h3>

            <h3 class="mt-4"></h3>
            <div class="table-responsive">
              <table class="table-students align-items-center my-4">
                  <thead>
                      <tr class="text-center">
                          <th scope="col">Student No.</th>
                          <th scope="col">Name</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($grades as $grade)
                      <tr class="text-center">
                        <td scope="row">
                          {{ $grade->student->getStudentNo() }}
                        </td>
                        <td>{{ $grade->student->user->getFullName() }}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>

            <div class="col button-group text-right">
              <button class="btn btn-sm btn-outline-primary btn-print">Print</button>
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="javascript:history.back()">
                Return
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footers.auth')

</div>
@endsection