<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'activity_id';
    public $timestamps = false;

    /**
     * Eloquent Relationships
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
