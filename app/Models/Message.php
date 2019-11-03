<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    public $primaryKey = 'message_id';
    public $timestamps = false;

    public function getDateCreated() {
        $created_at = strtotime($this->attributes['created_at']);

        return date('M d, Y', $created_at);
    }
}
