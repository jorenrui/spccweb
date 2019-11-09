<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'users';
    protected $username = 'username';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_picture', 'username', 'email', 'password', 'active', 'created_at', 'updated_at',
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

    public function getRole()
    {
        $roles = $this->roles;

        $result = '';

        if(sizeof($roles) > 1) {
            foreach($roles as $role) {
                if($result == '')
                    $result = '' . ucfirst($role->name);
                else if($role->name == 'super admin' || $role->name == 'hidden super admin')
                    continue;
                else
                    $result = $result . ', ' . ucfirst($role->name);
            }

            return $result;
        }

        return ucfirst($roles->first()->name);
    }

    public function getName()
    {
    	$first_name = $this->attributes['first_name'];
        $middle_initial = $this->attributes['middle_name'];

        if($middle_initial != null)
            $middle_initial = $middle_initial[0] . '.';

    	$last_name = $this->attributes['last_name'];

        if($middle_initial == '.')
            return $first_name . ' ' . $last_name;

    	return $first_name . ' ' . $middle_initial . ' ' . $last_name;
    }

    public function getSortableName()
    {
    	$first_name = $this->attributes['first_name'];
        $middle_initial = $this->attributes['middle_name'];

        if($middle_initial != null)
            $middle_initial = $middle_initial[0] . '.';

    	$last_name = $this->attributes['last_name'];

        if($middle_initial == '.')
            return $last_name . ', ' . $first_name;

    	return $last_name . ', ' . $first_name . ' ' . $middle_initial;
    }

    public function getNameWithTitle()
    {
    	$gender = $this->attributes['gender'];
        $last_name = $this->attributes['last_name'];

        if ($gender == 'M')
            return 'Mr. ' . $last_name;
        else if ($gender == 'F')
            return 'Ms. ' . $last_name;

        return 'Mx. ' . $last_name;
    }

    public function getFullName()
    {
    	$first_name = $this->attributes['first_name'];
    	$middle_name = $this->attributes['middle_name'];
    	$last_name = $this->attributes['last_name'];

        return $first_name . ' ' . $middle_name . ' ' . $last_name;
    }

    public function getGender()
    {
        $gender = $this->attributes['gender'];

        if ($gender == 'F')
            return 'Female';
        else if ($gender == 'M')
            return 'Male';

        return null;
    }

    public function getBirthdate()
    {
        $birthdate = $this->attributes['birthdate'];

        if($birthdate == null)
            return null;

        return Carbon::parse($birthdate)->format('F j, Y');
    }

    /**
     * Eloquent Relationships
     */

    public function student()
    {
        return $this->hasOne('App\Models\Student', 'user_id', 'id');
    }

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'user_id', 'id');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }

    public function activities() {
        return $this->hasMany('App\Models\Activity', 'user_id', 'id');
    }

}
