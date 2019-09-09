<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'employee_no';
    protected $casts = ['employee_no' => 'string'];
    public $timestamps = false;
    public $incrementing = false;

    /**
     * Eloquent Relationships
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function classes()
    {
        return $this->hasMany('App\Models\SClass', 'instructor_id', 'employee_no');
    }
}
