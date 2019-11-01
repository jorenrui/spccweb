@extends('layouts.app', ['title' => auth()->user()->hasRole('student') ? 'View Curriculum' : 'Students'])

@section('styles')
<link href="{{ asset('css/print/curriculum.css') }}" rel="stylesheet" media="print">
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
            </h2>
            <h3 class="text-center mt-0 mb-4">
              Caloocan Campus
            </h3>

            @foreach ($curriculum_details as $cur_details)
            <!-- Curriculum Details per School Year -->
              @foreach ($cur_details->groupBy('semester') as $cur_details)

                @if($cur_details[0]->sy == 3 && $cur_details[0]->semester == 1)
                  <div class="pagebreak"> </div>
                @endif

                <h4 class="mt-4">{{ $cur_details[0]->getAcadTerm() }}</h4>
                <div class="table-responsive">
                  <table class="table-curriculum align-items-center my-4">
                      <thead>
                          <tr>
                              <th scope="col" class="text-center w-11">Code</th>
                              <th scope="col" class="description">Description</th>
                              <th scope="col" class="text-center w-7">Units</th>
                              <th scope="col" class="text-center w-18">Pre-requisite(s)</th>
                              <th scope="col" class="text-center w-7">Sem</th>
                              <th scope="col" class="text-center w-12">SY</th>
                              <th scope="col" class="text-center w-7">Grade</th>
                              <th scope="col" class="text-center w-7"></th>
                          </tr>
                      </thead>
                      <tbody>
                        <!-- Curriculum Details per School Year -->
                        @foreach ($cur_details as $cur_detail)
                          <tr>
                            <td scope="row">
                              {{ $cur_detail->course_code }}
                            </td>
                            <td class="text-left">{{ $cur_detail->course->description }}</td>
                            <td class="text-center">{{ $cur_detail->course->units }}</td>
                            <td>
                              {{ $cur_detail->getYearStadingReq() }}
                              @if (count($cur_detail->prerequisites) > 0 && $cur_detail->getYearStadingReq() != '')
                                  ,
                              @endif
                              @foreach($cur_detail->prerequisites as $prereq)
                                {{ $prereq->course_code }}
                                @if($loop->iteration != $loop->count)
                                  ,
                                @endif
                              @endforeach
                            </td>
                            <td class="text-center">
                              {{ $cur_detail->getSem($grades, $user) }}
                            </td>
                            <td class="text-center">
                              {{ $cur_detail->getSy($grades, $user) }}
                            </td>
                            <td class="text-center">
                              {{ $cur_detail->getGrade($grades, $user, true) }}
                            </td>
                            <td class="text-center">
                              {{ $cur_detail->getCompletion($grades, $user) }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
              @endforeach
            @endforeach

            <p class="text-indent mt-4">
                This certification is being issued upon the request of {{ $user->getNameWithTitle() }} on {{ date('F d, Y') }}.
            </p>

            <p class="signature mt-5">
              <span class="text-uppercase">{{ $head_registrar->getName() }}</span>
              <br>Registrar
            </p>

            <p class="seal mt-4">
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