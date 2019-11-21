@extends('layouts.app', ['title' => auth()->user()->hasRole('student') ? 'View Enlistment' : 'Grade Report'])

@section('styles')
<link href="{{ asset('css/print/scholastic_records.css') }}" rel="stylesheet" media="print">
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
      <div class="card shadow card-grade">
        <div class="card-body row align-items-center">
          <div class="col">
            <p class="text-right">{{ date('F d, Y') }}</p>
            <h2 class="mb-4 text-center">
              CERTIFICATION
            </h2>

            <p>To Whom It May Concern:</p>

            <p class="text-indent">
              This is to certify that the following is the Scholastic Record/s of <b><u>{{ $user->getName()}}</u></b> taken this {{ $acad_term->getAcadTerm2() }}.
            </p>

            <p class="font-weight-bold">
              TERM/SEMESTER: <u>{{ $acad_term->getAcadTerm2() }}</u>
            </p>

            <div class="table-responsive">
              <table class="table-grade align-items-center my-4">
                  <thead>
                      <tr>
                          <th scope="col">COURSE CODE</th>
                          <th scope="col" class="description">DESCRIPTIVE TITLE</th>
                          <th scope="col" class="text-center">GRADE/S</th>
                          <th scope="col" class="text-center"></th>
                          <th scope="col" class="text-center">UNITS</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($classes->groupBy('acad_term_id') as $sclasses)

                      <tr>
                        <td class="text-bold">{{ $sclasses[0]->acadTerm->getAcadTerm3()}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      @foreach($sclasses as $sclass)
                      <tr>
                        <td>{{ $sclass->getTORCourseCode($user->student_no) }}</td>
                        <td>{{ $sclass->getTORDescription($user->student_no) }}</td>
                        <td class="text-center">{{ $sclass->getGrade($user->student->student_no) }}</td>
                        <td class="text-center">{{ $sclass->getCompletion($user->student->student_no) }}</td>
                        <td class="text-center">{{ $sclass->course->units }}</td>
                      </tr>
                      @endforeach

                      @if($loop->last)
                      <tr>
                        <td></td>
                        <td class="warning">** ENTRY BELOW THIS LINE IS NOT VALID **</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      @endif
                    @endforeach
                  </tbody>
              </table>
            </div>

            <p class="text-indent">
                This certification is being issued upon the request of the above-named student for whatever legal purpose it may serve him/her.
            </p>

            <p class="signature mt-5">
              <span class="text-uppercase">{{ $head_registrar->getName() }}</span>
              <br>Registrar
            </p>

            <p class="seal mt-5">
              Not valid w/o
              <br> The college seal
            </p>

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