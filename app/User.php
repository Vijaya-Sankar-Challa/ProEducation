<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number',
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
     *
     * Boot the model.
     *
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->token = str_random(40);
        });
    }
    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

    public function projects()
    {
        return $this->hasMany('App\Project', 'user_id');
    }

    public function postpro()
    {
       return $this->belongsToMany('App\Project', 'project_requests', 'user_id', 'job_id');
    }

    public function accpostpro()
    {
       return $this->belongsToMany('App\Project', 'project_accept', 'user_id', 'accept_id');
    }

}
