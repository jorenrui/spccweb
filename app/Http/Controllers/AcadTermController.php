<?php

namespace App\Http\Controllers;

use App\Models\AcadTerm;

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

        return view('acad_terms.index')->with('acadTerms', $acadTerms);
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
            'semester' => 'required'
        ]);

        $acad_term_id = substr($request->input('sy'), 2, 2) . substr($request->input('sy'), 7, 7) . $request->input('semester');

        // Add Acad Term
        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = $acad_term_id;
        $acadTerm->sy = $request->input('sy');
        $acadTerm->semester = $request->input('semester');
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
            'semester' => 'required'
        ]);

        $acad_term_id = substr($request->input('sy'), 2, 2) . substr($request->input('sy'), 7, 7) . $request->input('semester');

        // Update Acad Term
        $acadTerm = AcadTerm::find($id);
        $acadTerm->acad_term_id = $acad_term_id;
        $acadTerm->sy = $request->input('sy');
        $acadTerm->semester = $request->input('semester');
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
