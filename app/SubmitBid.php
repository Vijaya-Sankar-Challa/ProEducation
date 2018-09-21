<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitBid extends Model
{
    protected $table = 	'project_requests';

    public function sad()
    {
    	return $this->belongsTo('App\Project', 'job_id');
    }

    public function biduser()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

}
