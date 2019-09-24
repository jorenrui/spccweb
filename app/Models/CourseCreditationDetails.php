<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCreditationDetails extends Model
{
    protected $table = 'course_credit_details';
    protected $primaryKey = 'credit_details_id';
    public $timestamps = false;

    /**
     * Eloquent Relationships
     */

    public function creditedCourse()
    {
        return $this->belongsTo('App\Models\CourseCreditation', 'credit_id', 'credit_id');
    }

    public function curriculumDetails()
    {
        return $this->belongsTo('App\Models\CurriculumDetails', 'curriculum_details_id', 'curriculum_details_id');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\AcadTerm', 'acad_term_id', 'acad_term_id');
    }
}
