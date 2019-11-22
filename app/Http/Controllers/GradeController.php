<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\Setting;
use App\Models\AcadTerm;
use App\Models\Curriculum;
use App\Models\Activity;

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
        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

        $acad_terms = AcadTerm::all();

        if ( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        } else {
            $selected_acad_term = $cur_acad_term;
        }

        $search = null;

        if( request()->has('search')) {
            $search = request('search');

            $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)
                        ->where(function($q) use ($search) {
                            $q->where('class_id', 'like', '%'.$search.'%')
                              ->orWhere('course_code', 'like', '%'.$search.'%')
                              ->orWhere('section', 'like', '%'.$search.'%')
                              ->orWhere('lec_day', 'like', '%'.$search.'%')
                              ->orWhere('lab_day', 'like', '%'.$search.'%')
                              ->orWhere('instructor_id', 'like', '%'.$search.'%');
                        })
                        ->orderBy('course_code')
                        ->orderBy('section')
                        ->paginate(10);
            $classes->appends(['search' => $search, 'selected_acad_term' => $selected_acad_term]);
        } else {
            $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)
                        ->orderBy('course_code')
                        ->orderBy('section')
                        ->paginate(10);
        }

        return view('grades.index')
                ->with('classes', $classes)
                ->with('degree', $degree)
                ->with('acad_terms', $acad_terms)
                ->with('cur_acad_term', $cur_acad_term)
                ->with('selected_acad_term', $selected_acad_term)
                ->with('search', $search);
    }

    public function enrollStudent($id)
    {
        $sclass = SClass::find($id);
        $grades = $sclass->grades;

        // Get students except those who are already enrolled
        $except_grades = [];

        foreach($grades as $grade) {
            array_push($except_grades, $grade->student->student_no);
        }

        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                        ->where('is_active', true)
                        ->where('date_graduated', '=', null)
                        ->whereNotIn('student_no', $except_grades)
                        ->where(function($q) use ($search) {
                            $q->where('student_no', 'like', '%'.$search.'%')
                            ->orWhere('first_name', 'like', '%'.$search.'%')
                            ->orWhere('middle_name', 'like', '%'.$search.'%')
                            ->orWhere('last_name', 'like', '%'.$search.'%');
                        })
                        ->orderBy('users.last_name')
                        ->paginate(10);
            $students->appends(['search' => $search]);
        } else {
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                            ->where('is_active', true)
                            ->where('date_graduated', '=', null)
                            ->whereNotIn('student_no', $except_grades)
                            ->orderBy('users.last_name')
                            ->paginate(10);
        }

        return view('grades.create')
                ->with('grades', $grades)
                ->with('sclass', $sclass)
                ->with('students', $students)
                ->with('search', $search);
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

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;

        if ($grade->sclass->section != null)
            $activity->description = ' has enrolled student ' . $grade->student->getStudentNo() . ' to ' . $grade->sclass->course_code . ' ' . $grade->sclass->section. '.';
        else
            $activity->description = ' has enrolled student ' . $grade->student->getStudentNo() . ' to ' . $grade->sclass->course_code . '.';

        $activity->timestamp = now();
        $activity->save();

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
        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $grades = Grade::join('student', 'grade.student_no', '=', 'student.student_no')
                        ->join('users', 'users.id', '=', 'student.user_id')
                        ->where('grade.class_id', 'like', $sclass->class_id)
                        ->where(function($q) use ($search) {
                            $q->where('grade.student_no', 'like', '%'.$search.'%')
                              ->orWhere('users.first_name', 'like', '%'.$search.'%')
                              ->orWhere('users.middle_name', 'like', '%'.$search.'%')
                              ->orWhere('users.last_name', 'like', '%'.$search.'%');
                        })
                        ->orderBy('users.last_name')
                        ->paginate(10);
            $grades->appends(['search' => $search]);
        } else {
            $grades = Grade::join('student', 'grade.student_no', '=', 'student.student_no')
                        ->join('users', 'users.id', '=', 'student.user_id')
                        ->where('class_id', 'LIKE', $id)
                        ->orderBy('users.last_name')
                        ->paginate(10);
        }

        return view('grades.show')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
                ->with('degree', $degree)
                ->with('search', $search);
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
        $grades = Grade::join('student', 'grade.student_no', '=', 'student.student_no')
                    ->join('users', 'users.id', '=', 'student.user_id')
                    ->where('class_id', 'LIKE', $id)
                    ->orderBy('users.last_name')
                    ->get();

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
            $grade->save();
        }

        $sclass = SClass::find($class_id);

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;

        if ($grade->sclass->section != null)
            $activity->description = 'has altered the grades for ' . $grade->sclass->course_code . ' ' . $grade->sclass->section . ' class.';
        else
            $activity->description = 'has altered the grades for ' . $grade->sclass->course_code . ' class.';

        $activity->timestamp = now();
        $activity->save();

        return redirect('/grades/' . $class_id)->with('success', 'Grades Altered');
    }

    public function enterCompletionGrade($id) {
        $grade = Grade::find($id);

        return view('grades.completion_grade')->with('grade', $grade);
    }

    public function storeCompletionGrade(Request $request, $id) {
        $this->validate($request, [
            'grade' => 'required',
            'note' => 'required|min:3|max:20'
        ]);

        $grade = Grade::find($id);
        $grade->grade = $request->input('grade');
        $grade->note = $request->input('note');
        $grade->save();

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;

        if ($grade->sclass->section != null)
            $activity->description = 'has encoded the completion grade for Student' .  $grade->student->getStudentNo() . ' in ' . $grade->sclass->course_code . ' ' . $grade->sclass->section . ' class.';
        else
            $activity->description = 'has encoded the completion grade for Student ' .  $grade->student->getStudentNo() . ' in ' . $grade->sclass->course_code . ' class.';

        $activity->timestamp = now();
        $activity->save();

        return redirect('/grades/' . $grade->sclass->class_id )->with('success', 'Student ' . $grade->student->getStudentNo() . '\'s completion grade has been encoded.');
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

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;

        if ($grade->sclass->section != null)
            $activity->description = 'has removed the student ' . $grade->student->getStudentNo() . ' to ' . $grade->sclass->course_code . ' ' . $grade->sclass->section . ' class.';
        else
            $activity->description = 'has removed the student ' . $grade->student->getStudentNo() . ' to ' . $grade->sclass->course_code . ' class.';

        $activity->timestamp = now();
        $activity->save();

        return redirect('/classes/' . $class_id)->with('success', 'Student Removed');
    }
}
