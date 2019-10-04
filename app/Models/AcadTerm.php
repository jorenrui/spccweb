<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcadTerm extends Model
{
    protected $table = 'acad_term';
    protected $primaryKey = 'acad_term_id';
    public $timestamps = false;

    public function getAcadTerm()
    {
    	$sy = $this->attributes['sy'];
    	$sem = $this->attributes['semester'];

    	switch ($sem) {
    		case 1:
    			$sem = '1st';
    			break;
    		case 2:
    			$sem = '2nd';
    			break;

    		default:
    			break;
    	}

    	return 'S.Y. ' . $sy . ' ' . $sem . ' Semester';
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
