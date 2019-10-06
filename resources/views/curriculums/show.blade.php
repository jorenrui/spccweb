@extends('layouts.app', ['title' => 'Manage Curriculum'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">{{ $curriculum->curriculum_id }} Curriculum</h2>
                <p class="text-muted text-sm">{{ $degree }}</p>
                <p>
                  Effective S.Y.: {{ $curriculum->effective_sy }}
                  <br>
                  Total Units: {{ $curriculum->getTotalUnits() }}
                </p>

                <div class="row">
                  <div class="col">
                    <a href="/curriculums" class="btn btn-outline-secondary btn-sm">
                      Return
                    </a>
                    @role('admin|registrar')
                    <a href="/curriculums/{{ $curriculum->curriculum_id }}/edit" class="btn btn-outline-info btn-sm">
                      Edit Curriculum
                    </a>

                    <form action="{{ action('CurriculumController@destroy', $curriculum->curriculum_id) }}" method="post" style="display:inline">
                        @csrf
                        @method('delete')

                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirm('Are you sure you want to delete {{$curriculum->curriculum_id }} curriculum?') ? this.parentElement.submit() : ''">
                            Delete Curriculum
                        </button>
                    </form>
                    @endrole
                  </div>

                  @role('admin|registrar')
                  @if(count($curriculum_details) > 0)
                  <div class="col text-right">
                      <a href="/curriculum_details/create/{{ $curriculum->curriculum_id }}" class="btn btn-sm btn-primary">Add Course to Curriculum</a>
                  </div>
                  @endif
                  @endrole
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    @if(count($curriculum_details) > 0)
      @foreach ($curriculum_details as $cur_details)
        <!-- Curriculum Details per School Year -->
        @foreach ($cur_details->groupBy('semester') as $cur_details)
          <div class="row mt-3">
            <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">

                  <div class="card-header border-0">
                    <h3 class="mb-0">{{ $cur_details[0]->getAcadTerm() }}</h3>
                  </div>

                  <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                              <tr>
                                  <th scope="col" class="text-center">Course Code</th>
                                  <th scope="col" class="text-left">Course Title</th>
                                  <th scope="col" class="text-center">Units</th>
                                  <th scope="col" class="text-center">Lab Units</th>
                                  <th scope="col" class="text-center">Pre-requisites</th>
                                  <th scope="col" class="text-right"></th>
                              </tr>
                          </thead>
                          <tbody>
                            <!-- Curriculum Details per School Year -->
                            @foreach ($cur_details as $cur_detail)
                              <tr>
                                  <td class="text-center" scope="row">{{ $cur_detail->course_code }}</td>
                                  <td class="text-left">{{ $cur_detail->course->description }}</td>
                                  <td class="text-center">{{ $cur_detail->course->units }}</td>
                                  <td class="text-center">{{ $cur_detail->course->lab_units }}</td>
                                  <td class="text-center">
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
                                  <td class="text-right">
                                    @role('admin|registrar')
                                    <div class="dropdown">
                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="/curriculum_details/{{ $cur_detail->curriculum_details_id }}/edit" class="dropdown-item"">
                                            Edit
                                        </a>

                                        <form action="{{ action('CurriculumDetailsController@destroy', $cur_detail->curriculum_details_id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('delete')

                                            <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{ $cur_detail->course_code }} in this curriculum?') ? this.parentElement.submit() : ''">
                                                Delete
                                            </button>
                                        </form>
                                      </div>
                                      @endrole
                                    </div>
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>

              </div>
            </div>
          </div>
        @endforeach
      @endforeach
    @else
      <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-body row mt-3 mb-5">
                  <div class="col text-center">
                      <p class="lead">Curriculum is empty</p>
                      <br>
                      <a href="/curriculum_details/create/{{ $curriculum->curriculum_id }}" class="btn btn-primary btn-lg">Add Course to Curriculum</a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    @endif

      @include('layouts.footers.auth')
    </div>
@endsection