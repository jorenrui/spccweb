<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCreditation extends Model
{
    protected $table = 'course_creditation';
    protected $primaryKey = 'credit_id';
    public $timestamps = false;

    public function getTotalUnits() {
        $sum = 0;

        foreach($this->creditedCourses as $cur_detail) {
            $sum += $cur_detail->units;
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

    public function creditedCourses()
    {
        return $this->hasMany('App\Models\CourseCreditationDetails', 'credit_id', 'credit_id');
    }

}
