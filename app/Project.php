<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 	'post_project';

    /*public function user()
    {
    	$this->belongsToMany('App\User', 'project_requests');
    }
    public function users()
    {
    	$this->hasMany('App\User');
    }*/

    public function poster()
    {
    	//working
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function user()
    {
    	//working
    	return $this->belongsTo('App\User', 'user_id');
    }

	public function probids()
    {
    	//working
    	return $this->belongsTo('App\SubmitBid', 'job_id');
    }  

    public function threetables()
    {
    	return $this->belongsToMany('App\User', 'project_requests', 'user_id', 'job_id');
    }

   public function accpostpro()
    {
       return $this->belongsToMany('App\User', 'project_accept', 'accept_id', 'user_id');
    }

}
