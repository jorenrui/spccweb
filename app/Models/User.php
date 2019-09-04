<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $username = 'username';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'active', 'created_at', 'updated_at',
        'first_name', 'middle_name', 'last_name', 'gender', 'birthdate', 'contact_no', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserType()
    {
        if ($this->hasRole('admin'))
            return 'Admin';
        elseif ($this->hasRole('faculty'))
            return 'Faculty';
        elseif ($this->hasRole('registrar'))
            return 'Registrar';
        elseif ($this->hasRole('head registrar'))
            return 'Head Registrar';
        elseif ($this->hasRole('student'))
            return 'Student';
        elseif ($this->hasRole('moderator'))
            return 'Moderator';
        elseif ($this->hasRole('writer'))
            return 'Writer';
    }

    public function getName()
    {
    	$first_name = $this->attributes['first_name'];
    	$middle_initial = $this->attributes['middle_name'][0] . '.';
    	$last_name = $this->attributes['last_name'];

        if($middle_initial == '.')
            return $first_name . ' ' . $last_name;

    	return $first_name . ' ' . $middle_initial . ' ' . $last_name;
    }

    public function getSortableName()
    {
    	$first_name = $this->attributes['first_name'];
    	$middle_initial = $this->attributes['middle_name'][0] . '.';
    	$last_name = $this->attributes['last_name'];

        if($middle_initial == '.')
            return $last_name . ', ' . $first_name;

    	return $last_name . ', ' . $first_name . ' ' . $middle_initial;
    }

    public function posts() {
        return $this->hasMany('App\Models\Post', 'user_id', 'user_id');
    }
}
