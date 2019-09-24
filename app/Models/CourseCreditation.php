<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCreditation extends Model
{
    protected $table = 'course_creditation';
    protected $primaryKey = 'credit_id';
    public $timestamps = false;

    public function getTotalUnits()
    {
    	$credit_id = $this->attributes['credit_id'];
        $credit_details = CourseCreditationDetails::where('credit_id', $credit_id)->get();

        $sum = 0;

        foreach($credit_details as $credit_detail) {
            $sum += $credit_detail->curriculumDetails->course->units;
        }

        return $sum;
    }

    /**
     * Eloquent Relationships
     */

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_no', 'student_no');
    }
}
