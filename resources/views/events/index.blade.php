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
                        <div class="col text-right">
                            <a href="/events/create" class="btn btn-sm btn-primary">Add Event</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($events as $event)
                            <tr>
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
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
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