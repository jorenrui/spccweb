<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\AcadTerm;
use App\Models\Curriculum;
use App\Models\CurriculumDetails;
use App\Models\Setting;

use Illuminate\Http\Request;

class StudentAccessController extends Controller
{
    private function getEnlistment($student_no)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

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
            return $grade->sclass->lec_day == $day || $grade->sclass->lab_day == $day;
        });
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

    public function enlistment()
    {
        $user = User::find(auth()->user()->id);

        if( !$user->student->is_paid ) {
            return view('student.unpaid');
        }

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

        // Filter Grades for the Acad Term
        $grades = Grade::where('student_no', 'LIKE', $user->student->student_no)->get();

        $filtered_grades = array();

        foreach ($grades as $grade) {
            if ($grade->sclass->acad_term_id == $selected_acad_term) {
                array_push($filtered_grades, $grade);
            }
        }

        return view('student.grades')
            ->with('user', $user)
            ->with('degree', $degree)
            ->with('grades', $filtered_grades)
            ->with('acad_terms', $acad_terms)
            ->with('curAcadTerm', $curAcadTerm)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('selected_acad_term', $selected_acad_term);
    }

    public function curriculum()
    {
        $user = User::find(auth()->user()->id);

        if( !$user->student->is_paid ) {
            return view('student.unpaid');
        }

        $curriculum = Curriculum::find($user->student->curriculum_id);

        $curriculum_details = CurriculumDetails::where('curriculum_id', $user->student->curriculum_id)
                                ->orderBy('sy','asc')->orderBy('semester','asc')->get()->groupBy('sy');

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        return view('student.curriculum')
                ->with('user', $user)
                ->with('grades', $user->student->grades)
                ->with('curriculum', $curriculum)
                ->with('curriculum_details', $curriculum_details)
                ->with('degree', $degree);
    }
}
