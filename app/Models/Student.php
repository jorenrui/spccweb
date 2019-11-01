<?php

namespace App\Models;

use App\Models\Setting;
use App\Models\Grade;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'student_no';
    protected $casts = ['student_no' => 'string'];
    public $timestamps = false;
    public $incrementing = false;

    public function getStudentNo()
    {
        $student_no = $this->attributes['student_no'];

        return substr($student_no, 0, 2) . '-' .
               substr($student_no, 2, 2) . '-' .
               substr($student_no, 4);
    }

    private function isGraduate()
    {
        if($this->getDateGraduated() != null)
            return true;

        foreach ($this->curriculum->curriculumDetails as $cur_detail) {
            $isFound = false;

            if($this->student_type == 'Transferee') {
                foreach ($this->creditedCourses as $school) {
                    foreach ($school->creditedCourses as $ccourse) {

                        if ($ccourse->curriculum_details_id == $cur_detail->curriculum_details_id &&
                            $ccourse->getGrade() != 5 && $ccourse->getGrade() != null) {
                            $isFound = true;
                        }

                    }
                }
            }

            if( $isFound )
                continue;

            foreach ($this->grades as $grade) {
                if ($grade->curriculum_details_id == $cur_detail->curriculum_details_id &&
                    $grade->getGrade() != 5 && $grade->getGrade() != null) {
                        $isFound = true;
                }
            }

            if( !$isFound )
                return false;
        }

        return true;
    }

    private function isIrregular()
    {
        $student_type = $this->attributes['student_type'];

        if($student_type == 'Irregular')
            return true;
        else if($this->getDateGraduated() != null)
            return false;

        foreach($this->grades as $grade) {
            if($grade->getGrade() == 5)
                return true;
        }

        return false;
    }

    public function getStudentType()
    {
        $student_no = $this->attributes['student_no'];
        $student_type = $this->attributes['student_type'];

        if($this->isGraduate() || $student_type == 'Transferee') {
            return $student_type;
        }

        if ($this->isIrregular()) {
            $student = Student::find($student_no);
            $student->student_type = 'Irregular';
            $student->save();
        }

        return $student_type;
    }

    public function getStatus()
    {
        $student_no = $this->attributes['student_no'];

        if ($this->isGraduate() && $this->student_type != 'Graduate') {
            $student = Student::find($student_no);
            $student->date_graduated = now();
            $student->save();

            return 'Graduate';
        }
        else if($this->isGraduate()) {
            return 'Graduate';
        }

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $totalEnlistment = 0;

        foreach ($this->grades as $grade) {
            if($grade->sclass->acad_term_id == $cur_acad_term)
                $totalEnlistment++;
        }

        if($totalEnlistment > 0)
            return 'Enrolled';

        return 'Inactive';
    }

    public function getDateGraduated()
    {
        $date_graduated = $this->attributes['date_graduated'];

        if($date_graduated == null)
            return null;

        return Carbon::parse($date_graduated)->format('F j, Y');
    }

    /**
     * Eloquent Relationships
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\AcadTerm', 'acad_term_admitted_id', 'acad_term_id');
    }

    public function curriculum()
    {
        return $this->belongsTo('App\Models\Curriculum', 'curriculum_id', 'curriculum_id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade', 'student_no', 'student_no');
    }

    public function creditedCourses()
    {
        return $this->hasMany('App\Models\CourseCreditation', 'student_no', 'student_no');
    }
}
