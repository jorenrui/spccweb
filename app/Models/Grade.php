<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';
    protected $primaryKey = 'grade_id';
    public $timestamps = false;

    /**
     * Eloquent Relationships
     */

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_no', 'student_no');
    }

    public function sclass()
    {
        return $this->belongsTo('App\Models\SClass', 'class_id', 'class_id');
    }

    public function curriculumDetails()
    {
        return $this->belongsTo('App\Models\CurriculumDetails', 'curriculum_details_id', 'curriculum_details_id');
    }
}
