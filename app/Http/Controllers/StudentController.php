<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\Setting;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::whereHas("roles", function($q){ $q->where('name', 'student'); })->paginate(8);

        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    private function getEnlistment($student_no)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $user = SClass::find($student_no);
        $grades = Grade::where('student_no', 'LIKE', $student_no)->get();

        $filtered_grades = [];

        foreach ($grades as $grade) {
            if($grade->sclass->acad_term_id == $cur_acad_term)
                array_push($filtered_grades, $grade);
        }

        return $filtered_grades;
    }

    private function getClassesByDay($student_no, $day)
    {
        $grades = $this->getEnlistment($student_no);

        return array_filter($grades, function ($grade) use ($day){
            return $grade->sclass->day == $day;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;

        $student_no = $user->student->student_no;

        $grades = $this->getEnlistment($student_no);

        $m_grades = $this->getClassesByDay($student_no, 'M');
        $t_grades = $this->getClassesByDay($student_no, 'T');
        $w_grades = $this->getClassesByDay($student_no, 'W');
        $th_grades = $this->getClassesByDay($student_no, 'TH');
        $f_grades = $this->getClassesByDay($student_no, 'F');

        return view('students.show')
                ->with('user', $user)
                ->with('grades', $grades)
                ->with('m_grades', $m_grades)
                ->with('t_grades', $t_grades)
                ->with('w_grades', $w_grades)
                ->with('th_grades', $th_grades)
                ->with('f_grades', $f_grades)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
