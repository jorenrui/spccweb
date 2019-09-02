<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumDetails extends Model
{
    protected $table = 'curriculum_details';
    protected $primaryKey = 'curriculum_details_id';
    public $timestamps = false;

    public function getAcadTerm()
    {
    	$sy = $this->attributes['sy'];
    	$sem = $this->attributes['semester'];

    	switch ($sy) {
    		case 1:
    			$sy = '1st';
    			break;
    		case 2:
    			$sy = '2nd';
    			break;
            case 3:
                $sy = '3rd';
                break;

    		default:
                $sy =  $sy . 'th';
    			break;
        }

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

    	return $sy . ' Year ' . $sem . ' Semester';
    }

    /**
     * Eloquent Relationships
     */

    public function curriculum()
    {
        return $this->belongsTo('App\Models\Curriculum', 'curriculum_id', 'curriculum_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_code', 'course_code');
    }
}
