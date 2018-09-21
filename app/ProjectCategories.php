<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategories extends Model
{
    protected $table = 	'project_category';

    protected $fillable = ['name'];
}
