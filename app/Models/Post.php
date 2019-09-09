<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'post_id';
    public $timestamps = true;

    public function getDateCreated() {
        $created_at = strtotime($this->attributes['created_at']);

        return date('M d, Y', $created_at);
    }

    public function user() {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}