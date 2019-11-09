<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\CurriculumDetails;
use App\Models\Setting;

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
        $cur_curriculum_id = Setting::where('name', 'LIKE', 'Current Curriculum')->first()->value;
        $curCurriculum = Curriculum::find($cur_curriculum_id);

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $curriculums = Curriculum::where('curriculum_id', 'like', '%'.$search.'%')
                        ->orWhere('effective_sy', 'like', '%'.$search.'%')
                        ->orderBy('curriculum_id', 'desc')
                        ->paginate(15);
            $curriculums->appends(['search' => $search]);
        } else {
            $curriculums = Curriculum::orderBy('curriculum_id', 'desc')->paginate(15);
        }

        return view('curriculums.index')
                ->with('curriculums', $curriculums)
                ->with('curCurriculum', $curCurriculum)
                ->with('degree', $degree)
                ->with('search', $search);
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
        $curriculum = Curriculum::find($id);

        $curriculum_details = CurriculumDetails::where('curriculum_id', $curriculum->curriculum_id)
                                ->orderBy('sy','asc')->orderBy('semester','asc')->get()->groupBy('sy');

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        return view('curriculums.show')
                ->with('curriculum', $curriculum)
                ->with('curriculum_details', $curriculum_details)
                ->with('degree', $degree);
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
        // Check if it is the current curriculum
        $setting_id = Setting::where('name', 'LIKE', 'Current Curriculum')
                        ->first()->setting_id;
        $setting = Setting::find($setting_id);

        if($setting->value == $id)
            return redirect('/curriculums')->with('error','Curriculum canot be deleted due to being set as the Current Curriculum. Change the Current Curriculum before deletion.');

        $curriculum = Curriculum::find($id);

        $curriculum->delete();

        return redirect('/curriculums')->with('success', 'Curriculum Removed');
    }
}
