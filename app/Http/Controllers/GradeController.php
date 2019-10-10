<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\Setting;
use App\Models\AcadTerm;
use App\Models\Curriculum;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $acad_terms = AcadTerm::all();

        if( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        }
        else {
            $selected_acad_term = $cur_acad_term;
        }

        $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)->paginate(10);

        return view('grades.index')
                ->with('classes', $classes)
                ->with('degree', $degree)
                ->with('acad_terms', $acad_terms)
                ->with('cur_acad_term', $cur_acad_term)
                ->with('selected_acad_term', $selected_acad_term);
    }

    public function enrollStudent($id)
    {
        $sclass = SClass::find($id);
        $grades = $sclass->grades;

        // Get students except those who are already enrolled
        $except_grades = [];

        foreach($grades as $grade) {
            array_push($except_grades, $grade->student->user->id);
        }

        $students = User::whereHas("roles", function($q){ $q->where("name", "student"); })
                        ->whereNotIn('id', $except_grades)->paginate(10);

        return view('grades.create')
                ->with('grades', $grades)
                ->with('sclass', $sclass)
                ->with('students', $students);
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
            'student_no' => 'required',
            'class_id' => 'required',
        ]);

        // Add Grade
        $grade = new Grade;
        $grade->class_id = $request->input('class_id');
        $grade->student_no = $request->input('student_no');
        $grade->curriculum_details_id = $request->input('curriculum_details_id');
        $grade->save();

        return redirect('/classes/' . $request->input('class_id'))->with('success', 'Student Enrolled');
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

        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;

        return view('grades.show')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
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
        $sclass = SClass::find($id);
        $grades = Grade::where('class_id', 'LIKE', $id)->orderBy('student_no')->get();

        return view('grades.edit')
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

            if($grade->is_inc && empty($request->is_inc[$i])) {
                $grade->is_inc = false;
                $grade->note = null;
            }

            if (!empty($request->is_inc[$i])) {
                if($request->is_inc[$i] == 'on') {
                    $grade->is_inc = true;
                }
            }

            $grade->save();
        }

        return redirect('/grades/' . $class_id)->with('success', 'Grades Altered');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $class_id = $grade->class_id;

        $grade->delete();

        return redirect('/classes/' . $class_id)->with('success', 'Student Dropped');
    }
}
