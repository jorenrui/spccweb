@extends('layouts.app', ['title' => 'Examination Period'])

@section('content')
    @include('layouts.headers.exam_cards')

    <div class="container-fluid mt--7">

      <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($acadTerms) > 0 || $search != null)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <h3 class="mb-0">Academic Term Masterlist</h3>
                        </div>
                        <div class="col col-lg-4">
                            <form action="/acad_terms?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. 2019-2020" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($search != null)
                        <div class="col">
                            <a href="/acad_terms" class="btn btn-outline-secondary btn-sm">
                                {{ str_limit($search, 20) }}
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </a>
                        </div>
                        @endif
                        <div class="col text-right">
                            <a href="/acad_terms/create" class="btn btn-sm btn-primary">Add Academic Term</a>
                        </div>
                    </div>
                </div>

                @if($search != null && count($acadTerms) == 0)
                    <div class="row mt-3 mb-5">
                        <div class="col text-center">
                            <p class="lead">Academic Term not found</p>
                        </div>
                    </div>
                @endif

                @if(count($acadTerms) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Academic Term</th>
                                    <th scope="col" class="text-center">Prelims</th>
                                    <th scope="col" class="text-center">Midterms</th>
                                    <th scope="col" class="text-center">Finals</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($acadTerms as $acadTerm)
                                <tr>
                                    <td class="text-right" scope="row">
                                    @if($curAcadTerm->acad_term_id == $acadTerm->acad_term_id)
                                        <span class="badge badge-primary btn-sm">
                                            Current Acad Term
                                        </span>
                                    @else
                                        <form method="POST" action="settings/set_cur_acad_term/{{ $acadTerm->acad_term_id }}" style="display: inline;">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                                Set as Current Acad Term
                                            </button>
                                        </form>
                                    @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $acadTerm->getAcadTerm() }}
                                    </td>
                                    <td class="text-center">
                                        @if($acadTerm->prelims_id != null)
                                            {{ $acadTerm->prelimsEvent->getDate() }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($acadTerm->midterms_id != null)
                                            {{ $acadTerm->midtermsEvent->getDate() }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($acadTerm->finals_id != null)
                                            {{ $acadTerm->finalsEvent->getDate() }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/acad_terms/{{ $acadTerm->acad_term_id }}/edit">
                                                    Edit
                                                </a>
                                                <form action="{{ action('AcadTermController@destroy', $acadTerm->acad_term_id) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{ $acadTerm->getAcadTerm() }} academic term? This will delete all the data, including classes and grades, under this academic term.') ? this.parentElement.submit() : ''">
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
                        {{ $acadTerms->links() }}
                    </div>
                @endif
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No Academic Term found</p>
                          <br>
                          <a href="/acad_terms/create" class="btn btn-primary btn-lg">Add Academic Term</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection