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

        if($start_date == $end_date) {
            return date('d M', $start_date);
        }
        else if(date('M-Y', $start_date) == date('M-Y', $end_date)) {
            return date('d', $start_date) . '-' . date('d M', $end_date);
        }

        return date('M d', $start_date) . '-'. date('M d', $end_date);
    }

    public function getDate() {
        $start_date = strtotime($this->attributes['start_date']);
        $end_date = strtotime($this->attributes['end_date']);

        if($start_date == $end_date) {
            return date('M d, Y', $start_date);
        }
        else if(date('M-Y', $start_date) == date('M-Y', $end_date)) {
            return date('M d', $start_date) . '-' . date('d, Y', $end_date);
        }

        return date('M d, Y', $start_date) . '-'. date('M d, Y', $end_date);
    }
}