<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'student_no';
    protected $casts = ['student_no' => 'string'];
    public $timestamps = false;
    public $incrementing = false;

    /**
     * Eloquent Relationships
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function acadTerm()
    {
        return $this->belongsTo('App\Models\AcademicTerm', 'acad_term_admitted_id', 'acad_term_id');
    }

    public function curriculum()
    {
        return $this->belongsTo('App\Models\Curriculum', 'curriculum_id', 'curriculum_id');
    }
}
