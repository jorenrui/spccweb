@extends('layouts.app', ['title' => auth()->user()->hasRole('student') ? 'View Enlistment' : 'Grade Report'])

@section('styles')
<link href="{{ asset('css/print/grade_slip.css') }}" rel="stylesheet" media="print">
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
      <div class="card shadow card-grade-slip">
        <div class="card-body row align-items-center">
          <div class="col">
            <img src="{{ asset('spccweb/img/spcc-logo.png') }}" alt="SPCC Caloocan Logo" style="position: absolute; width: 130px; margin-top: 15px;">
            <div class="text-center">
              <h2 class="m-0">SYSTEMS PLUS COMPUTER COLLEGE</h2>
              <p class="m-0">10TH AVENUE, CALOOCAN CITY</p>
              <p class="m-0"><strong>FINAL GRADES</strong></p>
              <p class="text-uppercase m-0">
                <strong><i>
                {{ $acad_term->getAcadTerm2() }}
                </i></strong>
              </p>
            </div>

            <div class="row mt-5">
              <div class="col-7">

                <div class="row">
                  <dt class="col-4">
                    Student No:
                  </dt>
                  <dd class="col-8 text-uppercase">
                    {{ $user->student->getStudentNo() }}
                  </dd>
                </div>

                <div class="row">
                  <dt class="col-4">
                    Student Name:
                  </dt>
                  <dd class="col-8 text-uppercase">
                    {{ $user->getSortableName() }}
                  </dd>
                </div>

              </div>

              <div class="col-5">
                <div class="row">
                  <dt class="col-4">
                    Course:
                  </dt>
                  <dd class="col-8 text-uppercase">
                    BSIT
                  </dd>
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table-grade align-items-center my-4">
                  <thead style="border: 3px solid #000;">
                      <tr>
                          <th scope="col">Course Code</th>
                          <th scope="col" class="description">Descrition</th>
                          <th scope="col" class="text-center">Grade</th>
                          <th scope="col" class="text-center"></th>
                          <th scope="col" class="text-center">Unit</th>
                          <th scope="col" class="text-center">Remarks</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($grades as $grade)
                      <tr>
                        <td scope="row">{{ $grade->getCourseCode() }}</td>
                        <td>{{ $grade->getDescription() }}</td>
                        <td class="text-center">{{ $grade->getGrade() }}</td>
                        <td class="text-center">{{ $grade->getCompletion() }}</td>
                        <td class="text-center">
                            {{ $grade->sclass->course->units }}
                        </td>
                        <td class="text-center">
                          @if($grade->getRemarks() != null)
                            {{ $grade->getRemarks() }}
                          @endif
                        </td>
                      </tr>
                    @endforeach
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center total-units" style="border-top: 2px solid #000; border-bottom: 6px double #000;">
                          {{ $totalUnits }}
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="text-right">General Average</td>
                        <td class="text-center">{{ $generalAverage }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                  </tbody>
              </table>
            </div>

            <div class="signature mt-5 ">
              Certified Correct:
              <br /><br /><br />
              Mrs. {{ $head_registrar->getName() }}
              <br />
              Registrar
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