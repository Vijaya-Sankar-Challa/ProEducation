<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skills;
use App\SubSkills;
use App\SubmitBid;
use App\Project;
use App\ProjectAccept;
use App\ProjectCategories;
use App\ProjectSubCategories;
use Auth;

class admin extends Controller
{
    public function index()
    {
    	$user = Auth::user();

    	return view('admin.admin')->with(compact('user'));
    }

    public function dashboardindex()
    {
    	$user = Auth::user();
    	$user1 = User::all();
    	$project = Project::all();
    	$tobids = SubmitBid::all();

    	return view('admin.admindashboard')->with(compact('user'))
    									   ->with(compact('user1'))
    									   ->with(compact('project'))
    									   ->with(compact('tobids'));
    }

    public function usersindex()
    {
 	   $user = User::all();

    	return view('admin.adminusers')->with(compact('user'));	
    }
}
