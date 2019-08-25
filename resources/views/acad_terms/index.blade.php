@extends('layouts.app', ['title' => 'Academic Terms'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($acadTerms) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Academic Term</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/acad_terms/create" class="btn btn-sm btn-primary">Add Academic Term</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">Academic Term ID</th>
                                <th scope="col" class="text-center">School Year</th>
                                <th scope="col" class="text-center">Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($acadTerms as $acadTerm)
                            <tr>
                                <td class="text-left" scope="row">

                                    <a href="/acad_terms/{{ $acadTerm->acad_term_id }}/edit" class="btn btn-outline-info btn-sm">
                                      Edit
                                    </a>

                                    <form method="POST" action="{{ action('AcadTermController@destroy', $acadTerm->acad_term_id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>

                                </td>
                                <td class="text-center">{{ $acadTerm->acad_term_id }}</td>
                                <td class="text-center">{{ $acadTerm->sy }}</td>
                                <td class="text-center">{{ $acadTerm->semester }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
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