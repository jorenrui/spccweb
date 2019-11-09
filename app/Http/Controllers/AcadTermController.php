<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\AcadTerm;
use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcadTermController extends Controller
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
            $acadTerms = AcadTerm::where('sy', 'like', '%'.$search.'%')
                        ->orderBy('acad_term_id', 'desc')
                        ->paginate(15);
            $acadTerms->appends(['search' => $search]);
        } else {
            $acadTerms = AcadTerm::orderBy('acad_term_id', 'desc')->paginate(15);
        }

        $cur_acad_term_id = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term_id);

        return view('acad_terms.index')
                ->with('acadTerms', $acadTerms)
                ->with('curAcadTerm', $curAcadTerm)
                ->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acad_terms.create');
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
            'sy' => 'required|min:9|max:9',
            'semester' => 'required'
        ]);

        $acad_term_id = substr($request->input('sy'), 2, 2) . substr($request->input('sy'), 7, 7) . $request->input('semester');

        $prelims_id = null;
        $midterms_id = null;
        $finals_id = null;

        if($request->input('prelims_start_date') != null) {
            $prelims_start_date = date("Y-m-d", strtotime($request->input('prelims_start_date')));
            $prelims_end_date = date("Y-m-d", strtotime($request->input('prelims_end_date')));

            $event = new Event;
            $event->title = 'Prelims Examination';
            $event->start_date = $prelims_start_date;
            $event->end_date = $prelims_end_date;
            $event->save();

            $prelims_id = $event->event_id;
        }

        if($request->input('midterms_start_date') != null) {
            $midterms_start_date = date("Y-m-d", strtotime($request->input('midterms_start_date')));
            $midterms_end_date = date("Y-m-d", strtotime($request->input('midterms_end_date')));

            $event = new Event;
            $event->title = 'Midterms Examination';
            $event->start_date = $midterms_start_date;
            $event->end_date = $midterms_end_date;
            $event->save();

            $midterms_id = $event->event_id;
        }

        if($request->input('finals_start_date') != null) {
            $finals_start_date = date("Y-m-d", strtotime($request->input('finals_start_date')));
            $finals_end_date = date("Y-m-d", strtotime($request->input('finals_end_date')));

            $event = new Event;
            $event->title = 'Finals Examination';
            $event->start_date = $finals_start_date;
            $event->end_date = $finals_end_date;
            $event->save();

            $finals_id = $event->event_id;
        }

        // Add Acad Term
        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = $acad_term_id;
        $acadTerm->sy = $request->input('sy');
        $acadTerm->semester = $request->input('semester');
        $acadTerm->prelims_id = $prelims_id;
        $acadTerm->midterms_id = $midterms_id;
        $acadTerm->finals_id = $finals_id;
        $acadTerm->save();

        return redirect('/acad_terms')
                ->with('success', $acadTerm->getAcadTerm() . ' Academic Term Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acadTerm = AcadTerm::find($id);

        return view('acad_terms.edit')->with('acadTerm', $acadTerm);
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
            'sy' => 'required|min:9|max:9',
            'semester' => 'required'
        ]);

        $acad_term_id = substr($request->input('sy'), 2, 2) . substr($request->input('sy'), 7, 7) . $request->input('semester');

        // Update Acad Term
        $acadTerm = AcadTerm::find($id);
        $acadTerm->acad_term_id = $acad_term_id;
        $acadTerm->sy = $request->input('sy');
        $acadTerm->semester = $request->input('semester');

        if($request->input('prelims_start_date') != null) {
            $prelims_start_date = date("Y-m-d", strtotime($request->input('prelims_start_date')));
            $prelims_end_date = date("Y-m-d", strtotime($request->input('prelims_end_date')));

            if($acadTerm->prelims_id == null) {
                $event = new Event;
            } else {
                $event = Event::find($acadTerm->prelims_id);
            }

            $event->title = 'Prelims Examination';
            $event->start_date = $prelims_start_date;
            $event->end_date = $prelims_end_date;
            $event->save();

            $acadTerm->prelims_id = $event->event_id;
        }
        else if ($acadTerm->prelims_id != null) {
            $event = Event::find($acadTerm->prelims_id);
            $event->delete();

            $acadTerm->prelims_id = null;
        }

        if($request->input('midterms_start_date') != null) {
            $midterms_start_date = date("Y-m-d", strtotime($request->input('midterms_start_date')));
            $midterms_end_date = date("Y-m-d", strtotime($request->input('midterms_end_date')));

            if($acadTerm->midterms_id == null) {
                $event = new Event;
            } else {
                $event = Event::find($acadTerm->midterms_id);
            }

            $event->title = 'Midterms Examination';
            $event->start_date = $midterms_start_date;
            $event->end_date = $midterms_end_date;
            $event->save();

            $acadTerm->midterms_id = $event->event_id;
        }
        else if ($acadTerm->midterms_id != null) {
            $event = Event::find($acadTerm->midterms_id);
            $event->delete();

            $acadTerm->midterms_id = null;
        }

        if($request->input('finals_start_date') != null) {
            $finals_start_date = date("Y-m-d", strtotime($request->input('finals_start_date')));
            $finals_end_date = date("Y-m-d", strtotime($request->input('finals_end_date')));

            if($acadTerm->finals_id == null) {
                $event = new Event;
            } else {
                $event = Event::find($acadTerm->finals_id);
            }

            $event->title = 'Finals Examination';
            $event->start_date = $finals_start_date;
            $event->end_date = $finals_end_date;
            $event->save();

            $acadTerm->finals_id = $event->event_id;
        }
        else if ($acadTerm->finals_id != null) {
            $event = Event::find($acadTerm->finals_id);
            $event->delete();

            $acadTerm->finals_id = null;
        }

        $acadTerm->save();

        return redirect('/acad_terms')
                ->with('success', $acadTerm->getAcadTerm() . ' Academic Term Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if it is the current acad term
        $setting_id = Setting::where('name', 'LIKE', 'Current Acad Term')
                        ->first()->setting_id;
        $setting = Setting::find($setting_id);

        if($setting->value == $id)
            return redirect('/acad_terms')->with('error','Academic Term canot be deleted due to being set as the Current Academic Term. Change the Current Academic Term before deletion.');

        $acadTerm = AcadTerm::find($id);

        $acad_term = $acadTerm->getAcadTerm();

        if($acadTerm->prelims_id != null) {
            $event = Event::find($acadTerm->prelims_id);
            $event->delete();
        }

        if($acadTerm->midterms_id != null) {
            $event = Event::find($acadTerm->midterms_id);
            $event->delete();
        }

        if($acadTerm->finals_id != null) {
            $event = Event::find($acadTerm->finals_id);
            $event->delete();
        }

        $acadTerm->delete();

        return redirect('/acad_terms')->with('success', $acad_term . ' Academic Term Removed');
    }
}
