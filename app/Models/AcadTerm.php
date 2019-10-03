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

		private function getDate($start_date, $end_date) {
			if($start_date == $end_date) {
				return date('M d, Y', $start_date);
			}
			else if(date('M-Y', $start_date) == date('M-Y', $end_date)) {
					return date('M d', $start_date) . '-' . date('d, Y', $end_date);
			}

			return date('M d, Y', $start_date) . '-'. date('M d, Y', $end_date);
		}

		public function getPrelimsDate() {
			$start_date = strtotime($this->attributes['prelims_start_date']);
			$end_date = strtotime($this->attributes['prelims_end_date']);

			if($start_date == null)
				return null;

			return $this->getDate($start_date, $end_date);
		}

		public function getMidtermsDate() {
			$start_date = strtotime($this->attributes['midterms_start_date']);
			$end_date = strtotime($this->attributes['midterms_end_date']);

			if($start_date == null)
				return null;

			return $this->getDate($start_date, $end_date);
		}

		public function getFinalsDate() {
			$start_date = strtotime($this->attributes['finals_start_date']);
			$end_date = strtotime($this->attributes['finals_end_date']);

			if($start_date == null)
				return null;

			return $this->getDate($start_date, $end_date);
		}

		public function getFormattedDate($date) {
			return date("m/d/Y", strtotime($date));
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
}
