<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\AcadTerm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $events = Event::where('event_id', 'like', '%'.$search.'%')
                        ->orWhere('title', 'like', '%'.$search.'%')
                        ->orWhere('start_date', 'like', '%'.date('Y-m-d', strtotime($search)).'%')
                        ->orWhere('end_date', 'like', '%'.date('Y-m-d', strtotime($search)).'%')
                        ->orderBy('start_date', 'desc')
                        ->paginate(15);
            $events->appends(['search' => $search]);
        } else {
            $events = Event::orderBy('start_date', 'desc')->paginate(15);
        }

        return view('events.index')
                ->with('events', $events)
                ->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        // Add Event
        $event = new Event;
        $event->title = $request->input('title');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->save();

        return redirect('/events')->with('success', 'Event Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        // Update Event
        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->save();

        return redirect('/events')->with('success', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if($event->prelims != null) {
            $acadTerm = AcadTerm::find($event->prelims->acad_term_id);
            $acadTerm->prelims_id = null;
            $acadTerm->save();
        }

        if($event->midterms != null) {
            $acadTerm = AcadTerm::find($event->midterms->acad_term_id);
            $acadTerm->midterms_id = null;
            $acadTerm->save();
        }

        if($event->finals != null) {
            $acadTerm = AcadTerm::find($event->finals->acad_term_id);
            $acadTerm->finals_id = null;
            $acadTerm->save();
        }

        $event->delete();

        return redirect('/events')->with('success', 'Event Removed');
    }
}
