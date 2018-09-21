<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\User;
	use App\File;
	use App\InternshipCategory;
	use App\InternshipDepartment;
	use App\InternshipDetails;
	use App\InternshipRequest;
	use App\Project;
	use App\ProjectAccept;
	use App\ProjectCategories;
	use App\ProjectSubCategories;
	use App\Skills;
	use App\SubmitBid;
	use App\SubSkills;
	use Validator;

class TestController extends Controller
{

	public function relationships()
	{
		$projects = Project::all();
		$users = User::all();

	    return view('dsa')->with(compact('projects'))
	    				->with(compact('users'));
	}
    
}
	