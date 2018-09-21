<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Auth\Events\Registered;
use App\Project;
use Auth;

class AdminUserController extends Controller
{
    public function index()
    {
    	$project = Project::all();

    	return view('admin.adminprojectpost')->with(compact('project'));
    }
}