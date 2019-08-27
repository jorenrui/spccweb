<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums = Curriculum::orderBy('curriculum_id', 'desc')->paginate(15);

        return view('curriculums.index')->with('curriculums', $curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curriculums.create');
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
            'curriculum_id' => 'required',
            'effective_sy' => 'required'
        ]);

        // Add Curriculum
        $curriculum = new Curriculum;
        $curriculum->curriculum_id = $request->input('curriculum_id');
        $curriculum->effective_sy = $request->input('effective_sy');
        $curriculum->save();

        return redirect('/curriculums')->with('success', 'Curriculum Created');
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
        $curriculum = Curriculum::find($id);

        return view('curriculums.edit')->with('curriculum', $curriculum);
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
            'curriculum_id' => 'required',
            'effective_sy' => 'required'
        ]);

        // Update Curriculum
        $curriculum = Curriculum::find($id);
        $curriculum->curriculum_id = $request->input('curriculum_id');
        $curriculum->effective_sy = $request->input('effective_sy');
        $curriculum->save();

        return redirect('/curriculums')->with('success', 'Curriculum Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculum = Curriculum::find($id);

        $curriculum->delete();

        return redirect('/curriculums')->with('success', 'Curriculum Removed');
    }
}
