<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'class_id';
    public $timestamps = false;

    public function getTime()
    {
        $time_start = date('h:iA', strtotime($this->attributes['time_start']));
        $time_end =  date('h:iA', strtotime($this->attributes['time_end']));

        return $time_start . ' - ' . $time_end;
    }

    public function getSchedule()
    {
        $day = $this->attributes['day'];
        $time = $this->getTime();

        return $day . ', ' . $time;
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
        return $this->belongsTo('App\Models\AcademicTerm', 'acad_term_id', 'acad_term_id');
    }
}
