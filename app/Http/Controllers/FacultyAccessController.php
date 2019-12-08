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
    private function getClassesByDay($classes, $day)
    {
        $filtered_classes = collect([]);

        foreach ($classes as $sclass) {

            if ($sclass->lec_day == $day || $sclass->getLabDay() == $day) {

                if ($sclass->lec_day == $day) {

                    $new_class = array(
                        'time_start' => $sclass->lec_time_start,
                        'time_end' => $sclass->lec_time_end,
                        'time' => $sclass->getLecTime(),
                        'course' => $sclass->getCourse() . ' (LEC)',
                        'credits' => $sclass->course->getCredits(),
                        'room' => $sclass->room == null ? '-' : $sclass->room,
                        'total_students' => $sclass->getTotalStudents()
                    );

                    $filtered_classes->push($new_class);

                }

                if ($sclass->getLabDay() == $day) {

                    $new_class = array(
                        'time_start' => $sclass->lab_time_start,
                        'time_end' => $sclass->lab_time_end,
                        'time' => $sclass->getLabTime(),
                        'course' => $sclass->getCourse() . ' (LAB)',
                        'credits' => $sclass->course->getCredits(),
                        'room' => $sclass->room == null ? '-' : $sclass->room,
                        'total_students' => $sclass->getTotalStudents()
                    );

                    $filtered_classes->push($new_class);
                }

            }
        }

        $sorted = $filtered_classes->sortBy('time_start');

        return $sorted->values()->all();
    }

    private function getFacultyLoad($employee_no)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

        $load = SClass::where('acad_term_id', 'LIKE', $cur_acad_term)
                    ->where('instructor_id', 'LIKE', $employee_no)
                    ->get();

        return $load;
    }

    private function getClasses($load)
    {
        $classes = collect();

        $sclass = $this->getClassesByDay($load, 'M');
        $classes->push([ 'day' => 'Monday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'T');
        $classes->push([ 'day' => 'Tuesday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'W');
        $classes->push([ 'day' => 'Wednesday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'TH');
        $classes->push([ 'day' => 'Thursday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'F');
        $classes->push([ 'day' => 'Friday', 'classes' => $sclass]);

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

        $load = $this->getFacultyLoad($employee_no);
        $classes = $this->getClasses($load);

        return view('faculties.show')
                ->with('user', $user)
                ->with('classes', $classes)
                ->with('total_classes', count($load))
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
                            ->orderBy('course_code')
                            ->orderBy('section')
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

    public function unofficialDropStudent($id)
    {
        $grade = Grade::find($id);
        $grade->prelims = null;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->grade = 'UD';
        $grade->save();

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;

        if ($grade->sclass->section != null)
            $activity->description = 'has unofficially dropped the student ' . $grade->student->getStudentNo() . ' to ' . $grade->sclass->course_code . ' ' . $grade->sclass->section . ' class.';
        else
            $activity->description = 'has unofficially dropped the student ' . $grade->student->getStudentNo() . ' to ' . $grade->sclass->course_code . ' class.';

        $activity->timestamp = now();
        $activity->save();

        if($grade->sclass->section == null)
            $message = $grade->student->getStudentNo() . ' ' . $grade->student->user->getName() . ' has been unoffically dropped to ' . $grade->sclass->course_code . ' class.';
        else
            $message = $grade->student->getStudentNo() . ' ' . $grade->student->user->getName() . ' has been unoffically dropped to ' . $grade->sclass->course_code . ' ' . $grade->sclass->section . ' class.';

        if ($grade->sclass->instructor_id == auth()->user()->employee->employee_no) {
            return redirect('/faculty/load/' . $grade->sclass->class_id)->with('success', $message);
        }

        return redirect('/faculties/' . $grade->sclass->instructor->user->id . '/load/' . $grade->sclass->class_id)->with('success', $message);
    }

    public function setAsIncomplete($id)
    {
        $grade = Grade::find($id);
        $grade->prelims = null;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->is_inc = true;
        $grade->save();

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;

        if ($grade->sclass->section != null)
            $activity->description = 'has set student ' . $grade->student->getStudentNo() . '\'s grade in ' . $grade->sclass->course_code . ' ' . $grade->sclass->section . ' class to Incomplete.';
        else
            $activity->description = 'has set student ' . $grade->student->getStudentNo() . '\'s grade in ' . $grade->sclass->course_code . ' class to Incomplete.';

        $activity->timestamp = now();
        $activity->save();

        if ($grade->sclass->instructor_id == auth()->user()->employee->employee_no) {
            return redirect('/faculty/load/' . $grade->sclass->class_id)->with('success', 'Student ' . $grade->student->getStudentNo() . '\'s grade has been set as Incomplete');

        }

        return redirect('/grades/' . $grade->sclass->class_id)->with('success', 'Student ' . $grade->student->getStudentNo() . '\'s grade has been set as Incomplete');
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
        $grades = Grade::join('student', 'grade.student_no', '=', 'student.student_no')
                        ->join('users', 'users.id', '=', 'student.user_id')
                        ->where('class_id', 'LIKE', $id)
                        ->orderBy('users.last_name')
                        ->paginate(10);
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
        $grades = Grade::join('student', 'grade.student_no', '=', 'student.student_no')
                        ->join('users', 'users.id', '=', 'student.user_id')
                        ->where('class_id', 'LIKE', $id)
                        ->orderBy('users.last_name')
                        ->get();

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

        if($sclass->section != null) {
            $activity->description = 'has encoded the grades for ' . $sclass->course_code . ' '. $sclass->section . ' class.';
        } else {
            $activity->description = 'has encoded the grades for ' . $sclass->course_code . ' class.';
        }

        $activity->timestamp = now();
        $activity->save();

        if ($grade->sclass->instructor_id == auth()->user()->employee->employee_no) {
            return redirect('/faculty/load/' . $class_id)->with('success', 'Grades Encoded');
        }

        $sclass = SClass::find($class_id);

        return redirect('/faculties/' . $sclass->instructor->user->id . '/load/' . $class_id)->with('success', 'Grades Encoded');
    }

    public function showStudentMasterlist($id)
    {
        $sclass = SClass::find($id);

        return view('reports.students')
                ->with('sclass', $sclass)
                ->with('grades', $sclass->grades);
    }
}
