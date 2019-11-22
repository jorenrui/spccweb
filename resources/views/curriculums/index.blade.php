@extends('layouts.app', ['title' => 'Manage Curriculum'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($curriculums) > 0 || $search != null)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-4">
                            <h3 class="mb-0">Curriculum Masterlist</h3>
                            <p class="text-muted text-sm">{{ $degree }}</p>
                        </div>

                        <div class="col col-lg-4">
                            <form action="/curriculums?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. 2018 or 2018-2019" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($search != null)
                        <div class="col">
                            <a href="/curriculums" class="btn btn-outline-secondary btn-sm">
                                {{ str_limit($search, 20) }}
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </a>
                        </div>
                        @endif

                        <div class="col text-right">
                            <a href="/curriculums/create" class="btn btn-sm btn-primary">Add Curriculum</a>
                        </div>
                    </div>
                </div>

                @if($search != null && count($curriculums) == 0)
                    <div class="row mt-3 mb-5">
                        <div class="col text-center">
                            <p class="lead">Curriculum not found</p>
                        </div>
                    </div>
                @endif

                @if(count($curriculums) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Effective S.Y.</th>
                                    <th scope="col" class="text-center">Total Units</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($curriculums as $curriculum)
                                <tr>
                                    <td class="text-right" scope="row">
                                        <a href="/curriculums/{{ $curriculum->curriculum_id }}" class="btn btn-outline-primary btn-sm">
                                        View
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $curriculum->curriculum_id }}</td>
                                    <td class="text-center">{{ $curriculum->effective_sy }}</td>
                                    <td class="text-center">{{ $curriculum->getTotalUnits() }}</td>
                                    <td class="text-left">
                                    @if($curCurriculum->curriculum_id == $curriculum->curriculum_id)
                                        <span class="badge badge-primary btn-sm">
                                            Current Current Curriculum
                                        </span>
                                    @else
                                        <form method="POST" action="settings/set_cur_curriculum/{{ $curriculum->curriculum_id }}" style="display: inline;">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                                Set as Current Curriculum
                                            </button>
                                        </form>
                                    @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/curriculums/{{ $curriculum->curriculum_id }}/edit">
                                                    Edit
                                                </a>
                                                <form action="{{ action('CurriculumController@destroy', $curriculum->curriculum_id) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{$curriculum->curriculum_id }} curriculum? This will also delete the data associated with this curriculum like the students.') ? this.parentElement.submit() : ''">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $curriculums->links() }}
                    </div>
                @endif
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Curriculum found</p>
                          <br>
                          <a href="/curriculums/create" class="btn btn-primary btn-lg">Add Curriculum</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection