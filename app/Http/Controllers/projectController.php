<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Input;
use Auth;
use App\ProjectCategories;
use App\ProjectSubCategories;
use App\Skills;
use App\SubSkills;
use App\File;

class projectController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProjectCategories::all();

        $skills = SubSkills::all();

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

    	return view('free.postproject', compact('categories'), compact('skills'));
    }

    public function findproductname(Request $request)
    {
        $catid = ProjectCategories::where('name', $request->name)->value('id');
        $data = ProjectSubCategories::select('name', 'id')->where('category_id', $catid)->take(100)->get();

        return response()->json($data);
    }

    public function postpro(Request $request)
    {

        $filecount = $request->totalfiles;
        $fileid = $filecount.',';

        for ($i=1; $i <= $filecount ; $i++) { 
            $fileid .= $request->get('filedet')[$i].',';
        }

        echo $fileid;

    	$project = new Project;
    	$project->user_id = Auth::user()->id;
    	$project->category = $request->get('cat_job').','.$request->get('cate_job');
    	$project->project_name = $request->name;
        $skillss = implode(",", $request->get('skills_multiple'));
    	$project->skills = $skillss;
    	$project->description = $request->project_description;
        $project->file_ids = $fileid;
    	$project->budget_from = $request->project_budget1;
    	$project->budget_to = $request->project_budget2;
    	$project->save();

        $notification = array(
                'message' => 'Project has been Created Successfully',
                'alert-type' => 'success',
            );

    	return back()->with($notification);
    }
}
