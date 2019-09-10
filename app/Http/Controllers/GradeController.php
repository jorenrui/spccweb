<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SClass;
use App\Models\Grade;
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
        //
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
        $grade = Grade::find($id);
        $class_id = $grade->class_id;

        $grade->delete();

        return redirect('/classes/' . $class_id)->with('success', 'Student Dropped');
    }
}
