<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';
    protected $primaryKey = 'grade_id';
    public $timestamps = false;

    public function getCourseCode()
    {
        return $this->curriculumDetails->course_code;
    }

    public function getDescription()
    {
        return $this->curriculumDetails->course->description;
    }

    public function getAverage()
    {
        $prelims = $this->attributes['prelims'];
        $midterms = $this->attributes['midterms'];
        $finals = $this->attributes['finals'];

        if($finals == null)
            return null;

        $average = ($prelims + $midterms + $finals) / 3;
        $average = round( $average );

        return number_format($average, '2', '.', '');
    }

    public function getTransmutatedGrade($average)
    {
        if ($average == null)
            return null;

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
        else if ($average <= 74)
            return '5.00';
    }

    public function getGrade()
    {
        $grade = $this->attributes['grade'];
        $is_inc = $this->attributes['is_inc'];
        $note = $this->attributes['note'];

        if ($is_inc && $note == 'Final Exam')
            return 'NFE';
        else if ($is_inc)
            return 'INC';
        else if ($grade == 'DRP' || $grade == 'UD')
            return $grade;

        $average = $this->getAverage();

        return $this->getTransmutatedGrade($average);
    }

    public function getCompletion()
    {
        $grade = $this->attributes['grade'];
        $is_inc = $this->attributes['is_inc'];

        if( !$is_inc )
            return null;

        return $grade;
    }

    public function getRemarks()
    {
        $grade = $this->attributes['grade'];
        $is_inc = $this->attributes['is_inc'];
        $average = $this->getAverage();

        if ($grade == 'DRP')
            return 'Dropped';
        else if ($grade == 'UD')
            return 'Unofficially Dropped';

        if ($is_inc && $grade == null)
            return 'INCOMPLETE';
        else if ($is_inc && $grade == 3.00)
            return 'PASSED';
        else if ($is_inc && $grade == 5.00)
            return 'FAILED';

        if ($average == null)
            return null;

        $grade = $this->getTransmutatedGrade($average);

        if ($grade == 5)
            return 'FAILED';
        else
            return 'PASSED';
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
