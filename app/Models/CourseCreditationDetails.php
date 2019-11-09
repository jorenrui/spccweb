<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCreditationDetails extends Model
{
    protected $table = 'course_credit_details';
    protected $primaryKey = 'credit_details_id';
    public $timestamps = false;

    private function hasCreditedCourse()
    {
        $curriculum_details_id = $this->attributes['curriculum_details_id'];

        if($curriculum_details_id == null)
            return false;

        return true;
    }

    public function getCurriculumId()
    {
        if(!$this->hasCreditedCourse())
            return null;

        return $this->curriculumDetails->curriculum_id;
    }

    public function getCreditedCourse()
    {
        if(!$this->hasCreditedCourse())
            return null;

        return $this->curriculumDetails->curriculum_id . ' ' .
               $this->curriculumDetails->course_code;
    }

    public function getGrade()
    {
        $grade = $this->attributes['grade'];
        $is_inc = $this->attributes['is_inc'];

        if( is_numeric($grade) )
            return number_format($grade, 2, '.', '');

        return $grade;
    }

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
