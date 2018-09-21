<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSubCategories extends Model
{
    protected $table = 	'project_category_job';

    protected $fillable = ['name', 'category_id'];

    public function projectcat()
    {
    	return $this->belongsTo('ProjectCategories');
    }
}
