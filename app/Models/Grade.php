<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';
    protected $primaryKey = 'grade_id';
    public $timestamps = false;

    public function getGrade()
    {
        $average = $this->attributes['average'];

        if(!is_numeric($average)) {
            return null;
        }

        $average = round( $average );

        if ($average >= 96 && $average <= 100)
            return '1.00';
        else if ($average >= 94 && $average <= 95)
            return '1.25';
        else if ($average >= 92 && $average <= 93)
            return '1.50';
        else if ($average >= 89 && $average <= 91)
            return '1.75';
        else if ($average >= 87 && $average <= 88)
            return '2.00';
        else if ($average >= 84 && $average <= 86)
            return '2.25';
        else if ($average >= 80 && $average <= 83)
            return '2.50';
        else if ($average >= 78 && $average <= 79)
            return '2.75';
        else if ($average >= 75 && $average <= 77)
            return '3.00';
        else if ($average >= 74 && $average <= 65)
            return '5.00';
    }

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
