<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'post_id';
    public $timestamps = true;

    public function user() {
    	return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}