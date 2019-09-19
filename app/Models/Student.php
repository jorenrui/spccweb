<?php

namespace App\Models;

use App\Models\Setting;
use App\Models\Grade;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'student_no';
    protected $casts = ['student_no' => 'string'];
    public $timestamps = false;
    public $incrementing = false;

    public function getStatus()
    {
        $student_no = $this->attributes['student_no'];

        /* TODO: Add logic for checking if student has graduated */

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $totalEnlistment = 0;

        foreach ($this->grades as $grade) {
            if($grade->sclass->acad_term_id == $cur_acad_term)
                $totalEnlistment++;
        }

        if($totalEnlistment > 0)
            return 'Enrolled';

        return 'Inactive';
    }

    /**
     * Eloquent Relationships
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\AcadTerm', 'acad_term_admitted_id', 'acad_term_id');
    }

    public function curriculum()
    {
        return $this->belongsTo('App\Models\Curriculum', 'curriculum_id', 'curriculum_id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade', 'student_no', 'student_no');
    }
}
