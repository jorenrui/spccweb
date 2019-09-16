<?php

namespace App\Http\Controllers;

use App\Models\AcadTerm;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\Setting;

use Illuminate\Http\Request;

class FacultyLoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term);

        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;
        $acad_terms = AcadTerm::where('acad_term_id', '<=', $cur_acad_term)->get();

        if( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        }
        else {
            $selected_acad_term = $cur_acad_term;
        }

        $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)
                            ->where('instructor_id', 'LIKE', auth()->user()->employee->employee_no)
                            ->paginate(10);

        return view('faculty_load.index')
            ->with('degree', $degree)
            ->with('classes', $classes)
            ->with('acad_terms', $acad_terms)
            ->with('curAcadTerm', $curAcadTerm)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('selected_acad_term', $selected_acad_term);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sclass = SClass::find($id);
        $grades = Grade::where('class_id', 'LIKE', $id)->orderBy('student_no')->paginate(8);
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;

        return view('faculty_load.show')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
                ->with('degree', $degree)
                ->with('cur_acad_term', $cur_acad_term);
    }

    public function encodeGrades($id)
    {
        $sclass = SClass::find($id);
        $grades = Grade::where('class_id', 'LIKE', $id)->orderBy('student_no')->get();

        return view('faculty_load.encode')
                ->with('sclass', $sclass)
                ->with('grades', $grades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {
        // Update Grade
        foreach ($request->id as $i => $id) {
            $grade = Grade::find($request->grade_id[$i]);
            $grade->prelims = $request->prelims[$i];
            $grade->midterms = $request->midterms[$i];
            $grade->finals = $request->finals[$i];
            $grade->note = $request->note[$i];

            if($grade->average == 'INC' && empty($request->is_incomplete[$i])) {
                $grade->average = null;
                $grade->note = null;
            }

            if (!empty($request->is_incomplete[$i])) {
                if($request->is_incomplete[$i] == 'on') {
                    $grade->average = 'INC';
                }
            }
            else if (($request->prelims[$i] != null) && ($request->midterms[$i] != null) &&
                (       $request->finals[$i]) != null) {
                $grade->average = ($request->prelims[$i] + $request->midterms[$i] +
                                    $request->finals[$i]) / 3;
            }

            $grade->save();
        }

        return redirect('/faculty_load/' . $class_id)->with('success', 'Grades Encoded');
    }
}
