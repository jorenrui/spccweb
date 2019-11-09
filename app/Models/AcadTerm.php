<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcadTerm extends Model
{
    protected $table = 'acad_term';
    protected $primaryKey = 'acad_term_id';
    public $timestamps = false;

    public function getSem()
    {
        $sem = $this->attributes['semester'];

    	switch ($sem) {
    		case 1:
    			$sem = '1st Semester';
    			break;
    		case 2:
    			$sem = '2nd Semester';
    			break;
            case 3:
                $sem = '3rd Semester';
                break;
            case 4:
                $sem = '4th Semester';
                break;
            case 9:
                $sem = 'Summer';
                break;

    		default:
    			break;
        }

        return $sem;
    }
    public function getAcadTerm()
    {
    	$sy = $this->attributes['sy'];
        $sem = $this->getSem();

    	return 'S.Y. ' . $sy . ' ' . $sem;
	}

    public function getAcadTerm2()
    {
    	$sy = $this->attributes['sy'];
        $sem = $this->getSem();

    	return  $sem . ' S.Y. ' . $sy;
    }

    public function getAcadTerm3()
    {
    	$sy = $this->attributes['sy'];
        $sem = $this->getSem();

    	return  $sem . ' ' . $sy;
    }

    /**
     * Eloquent Relationships
     */

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'acad_term_admitted_id', 'acad_term_id');
    }

    public function classes()
    {
        return $this->hasMany('App\Models\SClass', 'acad_term_id', 'acad_term_id');
	}

    public function creditedCourses()
    {
        return $this->hasMany('App\Models\CourseCreditationDetails', 'acad_term_id', 'acad_term_id');
	}

    public function prelimsEvent()
    {
        return $this->belongsTo('App\Models\Event', 'prelims_id', 'event_id');
    }

    public function midtermsEvent()
    {
        return $this->belongsTo('App\Models\Event', 'midterms_id', 'event_id');
    }

    public function finalsEvent()
    {
        return $this->belongsTo('App\Models\Event', 'finals_id', 'event_id');
    }
}
