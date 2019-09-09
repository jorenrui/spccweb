<?php

namespace App\Models;

use App\Models\CurriculumDetails;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculum';
    protected $primaryKey = 'curriculum_id';
    public $timestamps = false;

    public function getTotalUnits() {
    	$curriculum_id = $this->attributes['curriculum_id'];
        $cur_details = CurriculumDetails::where('curriculum_id', $curriculum_id)->get();

        $sum = 0;

        foreach($cur_details as $cur_detail) {
            $sum += $cur_detail->course->units;
        }

        return $sum;
    }

    /**
     * Eloquent Relationships
     */

    public function curriculumDetails()
    {
        return $this->hasMany('App\Models\CurriculumDetails', 'curriculum_id', 'curriculum_id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'curriculum_id', 'curriculum_id');
    }
}
