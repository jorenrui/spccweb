<?php

namespace App\Models;

use App\Models\Setting;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'employee_no';
    protected $casts = ['employee_no' => 'string'];
    public $timestamps = false;
    public $incrementing = false;

    public function getEmployeeNo()
    {
        $employee_no = $this->attributes['employee_no'];

        return $employee_no[0] . '-' . substr($employee_no, 1);
    }

    public function getStatus()
    {
        $employee_no = $this->attributes['employee_no'];

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $totalLoad = 0;

        foreach ($this->classes as $sclass) {
            if($sclass->acad_term_id == $cur_acad_term)
                $totalLoad++;
        }

        if($totalLoad > 0)
            return 'Active';

        return 'Inactive';
    }

    public function getDateEmployed()
    {
        $date_employed = $this->attributes['date_employed'];

        if($date_employed == null)
            return null;

        return Carbon::parse($date_employed)->format('F j, Y');
    }

    public function getTotalHandledClasses()
    {
        return count($this->classes);
    }

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
