<?php

namespace App\Models;

use App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'class_id';
    public $timestamps = false;

    public function getCourse()
    {
        $course_code = $this->attributes['course_code'];

        $description = Course::where('course_code', 'LIKE', $course_code)->get()[0]->description;

        return $course_code . ' ' . $description;
    }

    public function getTime()
    {
        $time_start = date('h:iA', strtotime($this->attributes['time_start']));
        $time_end =  date('h:iA', strtotime($this->attributes['time_end']));

        return $time_start . ' - ' . $time_end;
    }

    public function getLecTime()
    {
        $lab_units = $this->course->lab_units;
        $time_start = strtotime($this->attributes['time_start']);

        $time_end = strtotime('+' . $lab_units . ' hours', $time_start);

        $time_start = date('h:iA', $time_start);
        $time_end = date('h:iA', $time_end);

        return $time_start . ' - ' . $time_end;
    }

    public function getLabTime()
    {
        $lab_units = $this->course->lab_units;
        $time_end = strtotime($this->attributes['time_end']);

        $time_start = strtotime('-' . ($lab_units - 1) . ' hours', $time_end);

        $time_start = date('h:iA', $time_start);
        $time_end = date('h:iA', $time_end);

        return $time_start . ' - ' . $time_end;
    }

    public function getSchedule()
    {
        $day = $this->attributes['day'];
        $time = $this->getTime();

        return $day . ', ' . $time;
    }


    public function getLecSchedule()
    {
        $day = $this->attributes['day'];
        $lec_time = $this->getLecTime();

        return $day . ', ' . $lec_time;
    }

    public function getLabSchedule()
    {
        $day = $this->attributes['day'];
        $lab_time = $this->getLabTime();

        return $day . ', ' . $lab_time;
    }

    public function getTotalStudents()
    {
        return count($this->grades);
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
