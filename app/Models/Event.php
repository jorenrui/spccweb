<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    public $primaryKey = 'event_id';
    public $timestamps = false;

    public function getEventDate() {
        $start_date = strtotime($this->attributes['start_date']);
        $end_date = strtotime($this->attributes['end_date']);

        if ($start_date == $end_date) {
            return date('d M', $start_date);
        }
        else if (date('M-Y', $start_date) == date('M-Y', $end_date)) {
            return date('d', $start_date) . '-' . date('d M', $end_date);
        }

        return date('M d', $start_date) . ' - '. date('M d', $end_date);
    }

    public function getDate() {
        $start_date = strtotime($this->attributes['start_date']);
        $end_date = strtotime($this->attributes['end_date']);

        if ($start_date == null)
            return null;
        else if ($start_date == $end_date) {
            return date('M d, Y', $start_date);
        }
        else if (date('M-Y', $start_date) == date('M-Y', $end_date)) {
            return date('M d', $start_date) . '-' . date('d, Y', $end_date);
        }
        else if (date('Y', $start_date) == date('Y', $end_date))
            return date('M d', $start_date) . '-' . date('M d, Y', $end_date);

        return date('M d, Y', $start_date) . ' - '. date('M d, Y', $end_date);
    }

    /**
     * Eloquent Relationships
     */

    public function prelims()
    {
        return $this->hasOne('App\Models\AcadTerm', 'prelims_id', 'event_id');
    }

    public function midterms()
    {
        return $this->hasOne('App\Models\AcadTerm', 'midterms_id', 'event_id');
    }

    public function finals()
    {
        return $this->hasOne('App\Models\AcadTerm', 'finals_id', 'event_id');
    }
}