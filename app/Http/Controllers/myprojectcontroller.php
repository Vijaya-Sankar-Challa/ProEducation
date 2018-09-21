<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubmitBid;
use App\User;
use App\Project;
use Auth;
use App\ProjectAccept;

class myprojectcontroller extends Controller
{
    public function index(Request $request)
    {
    	// $mybid = SubmitBid::where('user_id',Auth::user()->id);
    	$mypro = Project::all();
    	$user = User::all();
        function getUserIP(){
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];

            if(filter_var($client, FILTER_VALIDATE_IP))
            {
                $ip = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP))
            {
                $ip = $forward;
            }
            else
            {
                $ip = $remote;
            }

            return $ip;
        }
        $user_ip = getUserIP();

        $poi = Auth::user();
        $poi->visitor = $request->ip();
        $poi->save();
    	return view('free.myprojects',compact('mypro'),compact('user'));
    }

    public function acceptpro($projectname)
    {
    	$prodis = Project::where('project_name', $projectname)->first();
    	$biduser = SubmitBid::all();
    	$project = Project::all();
    	$user = User::all();

    	return view('user.acceptproject')->with(compact('prodis'))
    									 ->with(compact('biduser'))
    									 ->with(compact('project'))
    									 ->with(compact('user'));
    }

    public function reqacceptpro($proname,$proid,$userid)
    {
    	$acc = new ProjectAccept;

    	$acc->user_id = $userid;
    	$acc->accept_id = $proid;
    	$acc->save();

    	return redirect('/myprojects');
    }

}
