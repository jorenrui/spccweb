<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Grade;

use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'class_id';
    public $timestamps = false;

    public function getCourse()
    {
        $course_code = $this->attributes['course_code'];
        $section = $this->attributes['section'];

        $description = Course::where('course_code', 'LIKE', $course_code)->get()[0]->description;

        if($section != null)
            return $course_code . ' ' . $section . ' ' . $description;

        return $course_code . ' ' . $description;
    }

    public function getLabDay()
    {
        $lab_units = $this->course->lab_units;
        $lab_day = $this->attributes['lab_day'];

        if($lab_units == null || $lab_units == 0)
            return null;


        return $lab_day;
    }

    public function getLecTime()
    {
        $time_start = strtotime($this->attributes['lec_time_start']);
        $time_end = strtotime($this->attributes['lec_time_end']);

        $time_start = date('h:iA', $time_start);
        $time_end = date('h:iA', $time_end);

        return $time_start . ' - ' . $time_end;
    }

    public function getLabTime()
    {
        $time_start = strtotime($this->attributes['lab_time_start']);
        $time_end = strtotime($this->attributes['lab_time_end']);

        if($time_start == null)
            return null;

        $time_start = date('h:iA', $time_start);
        $time_end = date('h:iA', $time_end);

        return $time_start . ' - ' . $time_end;
    }

    public function getSchedule()
    {
        $lab_day = $this->attributes['lab_day'];
        $day = $this->attributes['lec_day'];
        $time = $this->getLecTime();

        if($this->course->lab_units != null) {
            $lab_time = $this->getLabTime();

            return $day . ' ' . $time . ', ' . $lab_day . ' ' . $lab_time;
        }

        return $day . ' ' . $time;
    }


    public function getLecSchedule()
    {
        $day = $this->attributes['lec_day'];
        $lec_time = $this->getLecTime();

        return $day . ', ' . $lec_time;
    }

    public function getLabSchedule()
    {
        $day = $this->attributes['lab_day'];
        $lab_time = $this->getLabTime();

        if ($this->course->lab_units == null)
            return null;
        else if ($day == null && $lab_time == null)
            return '-';

        return $day . ', ' . $lab_time;
    }

    public function getTotalStudents()
    {
        return count($this->grades);
    }

    private function getSOGFileName($filename)
    {
        return substr($filename, 18);
    }

    public function getSOGPrelims()
    {
        $filename = $this->attributes['sog_prelims'];

        return $this->getSOGFileName($filename);
    }

    public function getSOGMidterms()
    {
        $filename = $this->attributes['sog_midterms'];

        return $this->getSOGFileName($filename);
    }

    public function getSOGFinals()
    {
        $filename = $this->attributes['sog_finals'];

        return $this->getSOGFileName($filename);
    }

    public function getSOGAverage()
    {
        $filename = $this->attributes['sog_average'];

        return $this->getSOGFileName($filename);
    }

    public function isClassEnlisted($student)
    {
        $class_id = $this->attributes['class_id'];
        $grades = $student->grades;

        foreach ($grades as $grade) {
            if($grade->sclass->class_id == $class_id)
                return true;
        }

        return false;
    }

    private function findGrade($student_no)
    {
        $class_id = $this->attributes['class_id'];
        $grade = Grade::where('student_no', 'LIKE', $student_no)
                        ->where('class_id', 'LIKE', $class_id)
                        ->first();
        return $grade;
    }

    public function getTORCourseCode($student_no)
    {
        $grade = $this->findGrade($student_no);

        return $grade->curriculumDetails->course_code;
    }

    public function getTORDescription($student_no)
    {
        $grade = $this->findGrade($student_no);

        return $grade->curriculumDetails->course->description;
    }

    public function getGrade($student_no)
    {
        $grade = $this->findGrade($student_no);

        return $grade->getGrade();
    }

    public function getCompletion($student_no)
    {
        $grade = $this->findGrade($student_no);

        return $grade->getCompletion();
    }

    /**
     * Eloquent Relationships
     */

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_code', 'course_code');
    }

    public function instructor()
    {
        return $this->belongsTo('App\Models\Employee', 'instructor_id', 'employee_no');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\AcadTerm', 'acad_term_id', 'acad_term_id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade', 'class_id', 'class_id');
    }

}
