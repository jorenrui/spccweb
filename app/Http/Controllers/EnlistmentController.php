<?php

namespace App\Http\Controllers;

use App\Models\AcadTerm;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\Setting;

use Illuminate\Http\Request;

class EnlistmentController extends Controller
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

        // Filter Grades for the Acad Term
        $grades = Grade::where('student_no', 'LIKE',
                            auth()->user()->student->student_no)->get();

        $filtered_grades = array();

        foreach ($grades as $grade) {
            if ($grade->sclass->acad_term_id == $selected_acad_term) {
                array_push($filtered_grades, $grade);
            }
        }

        return view('enlistment.index')
            ->with('degree', $degree)
            ->with('grades', $filtered_grades)
            ->with('acad_terms', $acad_terms)
            ->with('curAcadTerm', $curAcadTerm)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('selected_acad_term', $selected_acad_term);
    }
}
