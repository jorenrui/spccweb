<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AcadTerm;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\Setting;
use App\Models\Activity;

use Illuminate\Http\Request;

class FacultyAccessController extends Controller
{
    private function getClassesByDay($employee_no, $day)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

        $classes = SClass::where('acad_term_id', 'LIKE', $cur_acad_term)
                            ->where('instructor_id', 'LIKE', $employee_no)
                            ->where('day', 'LIKE', $day)
                            ->get();

        return $classes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $employee_no = $user->employee->employee_no;

        $m_class = $this->getClassesByDay($employee_no, 'M');
        $t_class = $this->getClassesByDay($employee_no, 'T');
        $w_class = $this->getClassesByDay($employee_no, 'W');
        $th_class = $this->getClassesByDay($employee_no, 'TH');
        $f_class = $this->getClassesByDay($employee_no, 'F');

        $totalClasses = count($m_class) + count($t_class) +count($w_class) +
                        count($th_class) + count($f_class);

        return view('faculties.show')
                ->with('user', $user)
                ->with('totalClasses', $totalClasses)
                ->with('m_class', $m_class)
                ->with('t_class', $t_class)
                ->with('w_class', $w_class)
                ->with('th_class', $th_class)
                ->with('f_class', $f_class)
                ->with('degree', $degree);
    }

    public function load()
    {
        $user = User::find(auth()->user()->id);

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term);

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;
        $acad_terms = AcadTerm::where('acad_term_id', '<=', $cur_acad_term)->get();

        if( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        }
        else {
            $selected_acad_term = $cur_acad_term;
        }

        $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)
                            ->where('instructor_id', 'LIKE', $user->employee->employee_no)
                            ->paginate(10);

        return view('faculty.load')
            ->with('degree', $degree)
            ->with('user', $user)
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
        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $acad_term = $sclass->acadTerm;

        return view('faculty.show')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
                ->with('degree', $degree)
                ->with('acad_term', $acad_term)
                ->with('cur_acad_term', $cur_acad_term);
    }

    public function encodeGrades($id)
    {
        $sclass = SClass::find($id);
        $grades = Grade::where('class_id', 'LIKE', $id)->orderBy('student_no')->get();

        return view('faculty.encode')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
                ->with('acad_term', $sclass->acadTerm);
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

        // Update Locking of Grades
        $sclass = SClass::find($class_id);

        if( !$sclass->is_prelims_lock )
            $sclass->is_prelims_lock = true;

        if( !$sclass->is_midterms_lock )
            $sclass->is_midterms_lock = true;

        if( !$sclass->is_finals_lock )
            $sclass->is_finals_lock = true;

        $sclass->save();

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;
        $activity->description = 'has encoded the grades for ' . $grade->sclass->course_code . ' class.';
        $activity->timestamp = now();
        $activity->save();

        if(auth()->user()->hasRole('admin')) {
            $sclass = SClass::find($class_id);

            return redirect('/faculties/' . $sclass->instructor->user->id . '/load/' . $class_id)->with('success', 'Grades Encoded');
        }

        return redirect('/faculty/load/' . $class_id)->with('success', 'Grades Encoded');
    }

    public function showStudentMasterlist($id)
    {
        $sclass = SClass::find($id);

        return view('reports.students')
                ->with('sclass', $sclass)
                ->with('grades', $sclass->grades);
    }
}
