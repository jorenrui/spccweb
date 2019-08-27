@extends('layouts.app', ['title' => 'Manage Curriculum'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($curriculums) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Curriculum Masterlist</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/curriculums/create" class="btn btn-sm btn-primary">Add Curriculum</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Total Units</th>
                                <th scope="col" class="text-center">Effective S.Y.</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($curriculums as $curriculum)
                            <tr>
                                <td class="text-left" scope="row">
                                    <a href="/curriculums/{{ $curriculum->curriculum_id }}/show" class="btn btn-outline-primary btn-sm">
                                      View
                                    </a>

                                    <a href="/curriculums/{{ $curriculum->curriculum_id }}/edit" class="btn btn-outline-info btn-sm">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ action('CurriculumController@destroy', $curriculum->curriculum_id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td class="text-center">{{ $curriculum->curriculum_id }}</td>
                                <td class="text-center">--</td>
                                <td class="text-center">{{ $curriculum->effective_sy }}</td>
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
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $curriculums->links() }}
                </div>
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