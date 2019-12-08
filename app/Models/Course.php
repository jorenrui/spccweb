<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'course_code';
    protected $casts = ['course_code' => 'string'];
    public $timestamps = false;
    public $incrementing = false;

    public function getCourse()
    {
        $course_code = $this->attributes['course_code'];
        $description = $this->attributes['description'];

        return $course_code . ' ' . $description;
    }

    public function getCredits()
    {
        $credits = $this->attributes['units'];
        $lab_units = $this->attributes['lab_units'];

        if($lab_units != 0)
	        return $credits . ' units, 1 lec and 1 lab';

	    return $credits . ' units, 1 lec';
    }

    /**
     * Eloquent Relationships
     */

    public function curriculumDetails()
    {
        return $this->hasMany('App\Models\CurriculumDetails', 'course_code', 'course_code');
    }

    public function prerequisites()
    {
        return $this->hasMany('App\Models\Prerequisite', 'course_code', 'course_code');
    }
}
