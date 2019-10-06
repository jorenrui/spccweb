@extends('layouts.app', ['title' => 'Events'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

              @if(count($events) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Events</h3>
                        </div>
                        @role('admin|registrar')
                        <div class="col text-right">
                            <a href="/events/create" class="btn btn-sm btn-primary">Add Event</a>
                        </div>
                        @endrole
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Academic Term</th>
                                @role('admin|registrar')
                                <th scope="col"></th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($events as $event)
                            <tr>
                                <td class="text-center">{{ $event->event_id }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->getDate() }}</td>
                                <td>
                                    @if($event->prelims != null)
                                        {{ $event->prelims->getAcadTerm() }}
                                    @elseif($event->midterms != null)
                                        {{ $event->midterms->getAcadTerm() }}
                                    @elseif($event->finals != null)
                                        {{ $event->finals->getAcadTerm() }}
                                    @endif
                                </td>
                                @role('admin|registrar')
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="/events/{{ $event->event_id }}/edit">
                                                Edit
                                            </a>
                                            <form action="{{ action('EventsController@destroy', $event->event_id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete {{ $event->title }} event') ? this.parentElement.submit() : ''">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @endrole
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $events->links() }}
                </div>
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No events found</p>
                          <br>
                          <a href="/events/create" class="btn btn-primary btn-lg">Add Event</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection