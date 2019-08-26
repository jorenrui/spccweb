<?php

namespace App\Http\Controllers;

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
        $acadTerms = AcadTerm::orderBy('acad_term_id', 'desc')->paginate(15);

        $cur_acad_term_id = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term_id);

        return view('acad_terms.index')
                ->with('acadTerms', $acadTerms)
                ->with('curAcadTerm', $curAcadTerm);
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
            'sy' => 'required',
            'semester' => 'required',
            'prelims_start_date' => 'required',
            'prelims_end_date' => 'required',
            'midterms_start_date' => 'required',
            'midterms_end_date' => 'required',
            'finals_start_date' => 'required',
            'finals_end_date' => 'required'
        ]);

        $acad_term_id = substr($request->input('sy'), 2, 2) . substr($request->input('sy'), 7, 7) . $request->input('semester');
        $prelims_start_date = date("Y-m-d", strtotime($request->input('prelims_start_date')));
        $prelims_end_date = date("Y-m-d", strtotime($request->input('prelims_end_date')));
        $midterms_start_date = date("Y-m-d", strtotime($request->input('midterms_start_date')));
        $midterms_end_date = date("Y-m-d", strtotime($request->input('midterms_end_date')));
        $finals_start_date = date("Y-m-d", strtotime($request->input('finals_start_date')));
        $finals_end_date = date("Y-m-d", strtotime($request->input('finals_end_date')));

        // Add Acad Term
        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = $acad_term_id;
        $acadTerm->sy = $request->input('sy');
        $acadTerm->semester = $request->input('semester');
        $acadTerm->prelims_start_date = $prelims_start_date;
        $acadTerm->prelims_end_date = $prelims_end_date;
        $acadTerm->midterms_start_date = $midterms_start_date;
        $acadTerm->midterms_end_date = $midterms_end_date;
        $acadTerm->finals_start_date = $finals_start_date;
        $acadTerm->finals_end_date = $finals_end_date;
        $acadTerm->save();

        return redirect('/acad_terms')->with('success', 'Academic Term Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'sy' => 'required',
            'semester' => 'required',
            'prelims_start_date' => 'required',
            'prelims_end_date' => 'required',
            'midterms_start_date' => 'required',
            'midterms_end_date' => 'required',
            'finals_start_date' => 'required',
            'finals_end_date' => 'required'
        ]);

        $acad_term_id = substr($request->input('sy'), 2, 2) . substr($request->input('sy'), 7, 7) . $request->input('semester');
        $prelims_start_date = date("Y-m-d", strtotime($request->input('prelims_start_date')));
        $prelims_end_date = date("Y-m-d", strtotime($request->input('prelims_end_date')));
        $midterms_start_date = date("Y-m-d", strtotime($request->input('midterms_start_date')));
        $midterms_end_date = date("Y-m-d", strtotime($request->input('midterms_end_date')));
        $finals_start_date = date("Y-m-d", strtotime($request->input('finals_start_date')));
        $finals_end_date = date("Y-m-d", strtotime($request->input('finals_end_date')));

        // Update Acad Term
        $acadTerm = AcadTerm::find($id);
        $acadTerm->acad_term_id = $acad_term_id;
        $acadTerm->sy = $request->input('sy');
        $acadTerm->semester = $request->input('semester');
        $acadTerm->prelims_start_date = $prelims_start_date;
        $acadTerm->prelims_end_date = $prelims_end_date;
        $acadTerm->midterms_start_date = $midterms_start_date;
        $acadTerm->midterms_end_date = $midterms_end_date;
        $acadTerm->finals_start_date = $finals_start_date;
        $acadTerm->finals_end_date = $finals_end_date;
        $acadTerm->save();

        return redirect('/acad_terms')->with('success', 'Academic Term Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acadTerm = AcadTerm::find($id);

        $acadTerm->delete();

        return redirect('/acad_terms')->with('success', 'Academic Term Removed');
    }
}
