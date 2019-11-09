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
    			$sem = '1st Semester';
    			break;
    		case 2:
    			$sem = '2nd Semester';
    			break;
            case 9:
                $sem = 'Summer';
                break;

    		default:
    			break;
    	}

    	return $sy . ' Year ' . $sem;
    }

    public function getYearStadingReq()
    {
        $is_year_standing = $this->attributes['is_year_standing'];

        if(!$is_year_standing)
            return;
        $sy = $this->attributes['sy'];

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

        return $sy . ' Year Standing';
    }

    public function getSem($grades, $user)
    {
        foreach ($grades as $grade) {
            if ($grade->curriculum_details_id == $this->curriculum_details_id) {
                if ($grade->is_inc && $grade->getGrade() != 5)
                    return $grade->sclass->acadTerm->semester;
                else if( $grade->getGrade() != 'DRP' && $grade->getGrade() != 'UD'  )
                    return $grade->sclass->acadTerm->semester;
            }
        }

        if ($user->student->student_type != 'Transferee')
            return null;

        $cschools = $user->student->creditedCourses;

        if (count($cschools) < 0)
            return null;

        foreach ($cschools as $cschool) {
            foreach ($cschool->creditedCourses as $ccourse) {
                if($ccourse->curriculum_details_id == $this->curriculum_details_id) {
                    if ($ccourse->is_inc && $grade->grade != 5)
                        return $ccourse->acadTerm->semester;
                    else if( $grade->grade != 'DRP' && $grade->grade != 'UD' )
                        return $ccourse->acadTerm->semester;
                }
            }
        }

        return null;
    }

    public function getSy($grades, $user)
    {
        foreach ($grades as $grade) {
            if ($grade->curriculum_details_id == $this->curriculum_details_id) {
                if ($grade->is_inc && $grade->getGrade() != 5)
                    return $grade->sclass->acadTerm->sy;
                else if( $grade->getGrade() != 'DRP' && $grade->getGrade() != 'UD'  )
                    return $grade->sclass->acadTerm->sy;
            }
        }

        if ($user->student->student_type != 'Transferee')
            return null;

        $cschools = $user->student->creditedCourses;

        if (count($cschools) < 0)
            return null;

        foreach ($cschools as $cschool) {
            foreach ($cschool->creditedCourses as $ccourse) {
                if($ccourse->curriculum_details_id == $this->curriculum_details_id) {
                    if ($ccourse->is_inc && $grade->grade != 5)
                        return $ccourse->acadTerm->sy;
                    else if( $grade->grade != 'DRP' && $grade->grade != 'UD' )
                        return $ccourse->acadTerm->sy;
                }
            }
        }

        return null;
    }

    public function getGrade($grades, $user, $isNoDropped = false)
    {
        foreach ($grades as $grade) {
            if ($grade->curriculum_details_id == $this->curriculum_details_id) {
                if ( $isNoDropped && ($grade->is_inc && $grade->getGrade() != 5) )
                    return 'INC';
                else if( $isNoDropped && $grade->getGrade() != 'DRP' && $grade->getGrade() != 'UD' )
                    return $grade->getGrade();
                else if ( !$isNoDropped )
                    return $grade->getGrade();
            }
        }

        if ($user->student->student_type != 'Transferee')
            return null;

        $cschools = $user->student->creditedCourses;

        if (count($cschools) < 0)
            return null;

        foreach ($cschools as $cschool) {
            foreach ($cschool->creditedCourses as $ccourse) {
                if($ccourse->curriculum_details_id == $this->curriculum_details_id) {
                    if($isNoDropped && $ccourse->getGrade() != 'DRP' && $ccourse->getGrade() != 'UD') {
                        if ($ccourse->is_inc && $ccourse->grade != 5)
                            return 'INC';
                        else
                            return $ccourse->getGrade();
                    }
                    else if ( !$isNoDropped )
                        return $ccourse->getGrade();
                }
            }
        }

        return null;
    }

    public function getCompletion($grades, $user)
    {
        foreach ($grades as $grade) {
            if ($grade->curriculum_details_id == $this->curriculum_details_id) {
                return $grade->getCompletion();
            }
        }

        if ($user->student->student_type != 'Transferee')
            return null;

        $cschools = $user->student->creditedCourses;

        if (count($cschools) < 0)
            return null;

        foreach ($cschools as $cschool) {
            foreach ($cschool->creditedCourses as $ccourse) {
                if($ccourse->curriculum_details_id == $this->curriculum_details_id) {
                    return $ccourse->is_inc ? $ccourse->getGrade() : null;
                }
            }
        }

        return null;
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

    public function prerequisites()
    {
        return $this->hasMany('App\Models\Prerequisite', 'curriculum_details_id', 'curriculum_details_id');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade', 'curriculum_details_id', 'curriculum_details_id');
    }

    public function creditedCourses()
    {
        return $this->hasMany('App\Models\CourseCreditationDetails', 'curriculum_details_id', 'curriculum_details_id');
    }
}
