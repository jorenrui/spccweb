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
}
