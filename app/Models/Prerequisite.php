<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prerequisite extends Model
{
    protected $table = 'prerequisite';
    protected $primaryKey = 'prerequisite_id';
    public $timestamps = false;

    /**
     * Eloquent Relationships
     */

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_code', 'course_code');
    }

    public function curriculumDetail()
    {
        return $this->belongsTo('App\Models\CurriculumDetails', 'curriculum_details_id', 'curriculum_details_id');
    }
}
