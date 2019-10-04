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
                                @role('admin|registrar')
                                <th scope="col"></th>
                                @endrole
                                <th scope="col">Event Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Academic Term</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($events as $event)
                            <tr>
                                @role('admin|registrar')
                                <td class="text-left" scope="row">

                                    <a href="/events/{{ $event->event_id }}/edit" class="btn btn-outline-info btn-sm">
                                      Edit
                                    </a>

                                    <form method="POST" action="{{ action('EventsController@destroy', $event->event_id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>

                                </td>
                                @endrole
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