<?php

namespace App\Http\Controllers;

use App\Models\SClass;
use App\Models\Course;
use App\Models\Grade;
use App\Models\User;
use App\Models\AcadTerm;
use App\Models\Setting;
use App\Models\Activity;

use Illuminate\Http\Request;

class SClassController extends Controller
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
                              ->orWhere('day', 'like', '%'.$search.'%')
                              ->orWhere('instructor_id', 'like', '%'.$search.'%');
                        })
                        ->orderBy('course_code')
                        ->orderBy('section')
                        ->paginate(10);
        } else {
            $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)
                        ->orderBy('course_code')
                        ->orderBy('section')
                        ->paginate(10);
        }

        return view('classes.index')
                ->with('classes', $classes)
                ->with('degree', $degree)
                ->with('acad_terms', $acad_terms)
                ->with('cur_acad_term', $cur_acad_term)
                ->with('selected_acad_term', $selected_acad_term)
                ->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $acad_terms = AcadTerm::where('acad_term_id', '>=', $cur_acad_term)->get();
        $instructors = User::whereHas("roles", function($q){ $q->where("name", "faculty"); })->get();
        $admins = User::whereHas("roles", function($q){ $q->where("name", "super admin"); })->get();
        $courses = Course::all();

        return view('classes.create')
                ->with('courses', $courses)
                ->with('acad_terms', $acad_terms)
                ->with('instructors', $instructors)
                ->with('admins', $admins);
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
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'acad_term_id' => 'required',
            'course_code' => 'required',
            'instructor_id' => 'required'
        ]);

        // Add Class
        $sclass = new SClass;
        $sclass->section = $request->input('section');
        $sclass->day = $request->input('day');
        $sclass->room = $request->input('room');
        $sclass->time_start = $request->input('time_start');
        $sclass->time_end = $request->input('time_end');
        $sclass->acad_term_id = $request->input('acad_term_id');
        $sclass->course_code = $request->input('course_code');
        $sclass->instructor_id = $request->input('instructor_id');
        $sclass->save();

        return redirect('/classes/' . $sclass->class_id)->with('success', 'Class Created');
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
                        ->orderBy('grade.student_no')
                        ->paginate(8);
        } else {
            $grades = Grade::where('class_id', 'LIKE', $id)->orderBy('student_no')->paginate(8);
        }

        return view('classes.show')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
                ->with('degree', $degree)
                ->with('search', $search);
    }

    public function lockGrades(Request $request)
    {
        $this->validate($request, [
            'class_id' => 'required'
        ]);

        $sclass = SClass::find($request->input('class_id'));

        if ($request->input('is_prelims_lock') == 'on')
            $sclass->is_prelims_lock = true;
        else
            $sclass->is_prelims_lock = false;

        if ($request->input('is_midterms_lock') == 'on')
            $sclass->is_midterms_lock = true;
        else
            $sclass->is_midterms_lock = false;

        if ($request->input('is_finals_lock') == 'on')
            $sclass->is_finals_lock = true;
        else
            $sclass->is_finals_lock = false;

        $sclass->save();

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;

        if ($sclass->section != null)
            $activity->description = 'has updated the locking of grades for ' . $sclass->getCourse() . '-' . $sclass->section . ' class.';
        else
            $activity->description = 'has updated the locking of grades for ' . $sclass->getCourse() . ' class.';

        $activity->timestamp = now();
        $activity->save();

        return redirect('/grades/' . $sclass->class_id)->with('success', 'Locking of Grades Updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $acad_terms = AcadTerm::where('acad_term_id', '>=', $cur_acad_term)->get();
        $instructors = User::whereHas("roles", function($q){ $q->where("name", "faculty"); })->get();
        $admins = User::whereHas("roles", function($q){ $q->where("name", "super admin"); })->get();

        $courses = Course::all();
        $sclass = SClass::find($id);

        return view('classes.edit')
                ->with('courses', $courses)
                ->with('acad_terms', $acad_terms)
                ->with('instructors', $instructors)
                ->with('admins', $admins)
                ->with('sclass', $sclass);
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
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'acad_term_id' => 'required',
            'course_code' => 'required',
            'instructor_id' => 'required'
        ]);

        // Update Class
        $sclass = SClass::find($id);
        $sclass->section = $request->input('section');
        $sclass->day = $request->input('day');
        $sclass->room = $request->input('room');
        $sclass->time_start = $request->input('time_start');
        $sclass->time_end = $request->input('time_end');
        $sclass->acad_term_id = $request->input('acad_term_id');
        $sclass->course_code = $request->input('course_code');
        $sclass->instructor_id = $request->input('instructor_id');
        $sclass->save();

        return redirect('/classes/' . $sclass->class_id)->with('success', 'Class Updated');
    }

    public function dropStudent($id, $grade_id)
    {
        $grade = Grade::find($grade_id);
        $grade->prelims = null;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->status = 'DRP';
        $grade->save();

        if($grade->sclass->section == null)
            return redirect('/classes/' . $id)->with('success', $grade->student->getStudentNo() . ' ' . $grade->student->user->getName() . ' has been dropped to ' . $grade->sclass->course_code . ' class.');

        return redirect('/classes/' . $id)->with('success', $grade->student->getStudentNo() . ' ' . $grade->student->user->getName() . ' has been dropped to ' . $grade->sclass->course_code . ' ' . $grade->sclass->section . ' class.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sclass = SClass::find($id);

        $sclass->delete();

        return redirect('/classes')->with('success', 'Class Removed');
    }
}
