<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\User;
use App\Models\Student;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\AcadTerm;
use App\Models\Curriculum;
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
        $curriculums = Curriculum::all();
        $acad_terms = AcadTerm::all();
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;
        $cur_curriculum_id = Setting::where('name', 'LIKE', 'Current Curriculum')->get()[0]->value;

        return view('students.create')
                    ->with('curriculums', $curriculums)
                    ->with('acad_terms', $acad_terms)
                    ->with('cur_acad_term', $cur_acad_term)
                    ->with('cur_curriculum_id', $cur_curriculum_id);
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
            'date_admitted' => 'required',
            'acad_term_admitted_id' => 'required',
            'curriculum_id' => 'required',
            'student_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'primary' => 'required',
            'primary_sy' => 'required',
            'intermediate' => 'required',
            'intermediate_sy' => 'required',
            'secondary' => 'required',
            'secondary_sy' => 'required'
        ]);

        // Add Student
        // Default Credentials:
        // Username: Student No, Password: Birthdate
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->birthdate = $request->input('birthdate');
        $user->contact_no = $request->input('contact_no');
        $user->address = $request->input('address');
        $user->username = $request->input('student_no');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('birthdate'));
        $user->save();

        $user->assignRole('student');

        $student = new Student;
        $student->student_no = $request->input('student_no');
        $student->primary = $request->input('primary');
        $student->primary_sy = $request->input('primary_sy');
        $student->intermediate = $request->input('intermediate');
        $student->intermediate_sy = $request->input('intermediate_sy');
        $student->secondary = $request->input('secondary');
        $student->secondary_sy = $request->input('secondary_sy');
        $student->date_admitted = $request->input('date_admitted');
        $student->student_type = $request->input('student_type');
        $student->curriculum_id = $request->input('curriculum_id');
        $student->acad_term_admitted_id = $request->input('acad_term_admitted_id');
        $student->user_id = $user->id;
        $student->save();

        return redirect('/students')->with('success', 'Student Created');
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
        $user = User::find($id);
        $curriculums = Curriculum::all();
        $acad_terms = AcadTerm::all();

        return view('students.edit')
                    ->with('user', $user)
                    ->with('curriculums', $curriculums)
                    ->with('acad_terms', $acad_terms);
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
            'student_no' => 'required',
            'date_admitted' => 'required',
            'acad_term_admitted_id' => 'required',
            'curriculum_id' => 'required',
            'student_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'primary' => 'required',
            'primary_sy' => 'required',
            'intermediate' => 'required',
            'intermediate_sy' => 'required',
            'secondary' => 'required',
            'secondary_sy' => 'required'
        ]);

        // Update Student
        // Default Credentials:
        // Username: Student No, Password: Birthdate
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->birthdate = $request->input('birthdate');
        $user->contact_no = $request->input('contact_no');
        $user->address = $request->input('address');
        $user->username = $request->input('student_no');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('birthdate'));
        $user->save();

        $student_no = $user->student->student_no;

        $student = Student::find($student_no);
        $student->primary = $request->input('primary');
        $student->primary_sy = $request->input('primary_sy');
        $student->intermediate = $request->input('intermediate');
        $student->intermediate_sy = $request->input('intermediate_sy');
        $student->secondary = $request->input('secondary');
        $student->secondary_sy = $request->input('secondary_sy');
        $student->date_admitted = $request->input('date_admitted');
        $student->student_type = $request->input('student_type');
        $student->curriculum_id = $request->input('curriculum_id');
        $student->acad_term_admitted_id = $request->input('acad_term_admitted_id');
        $student->save();

        return redirect('/students')->with('success', 'Student Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/students')->with('success', 'Student Deleted');
    }
}
