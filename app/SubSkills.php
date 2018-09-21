<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSkills extends Model
{
    protected $table = 	'skills';

    protected $fillable = ['name', 'skills_id'];

        public function skills()
    {
    	return $this->belongsTo('Skills');
    }
}
