<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skills;
use App\Project;
use App\SubmitBid;
use App\User;
use App\File;
use Illuminate\Support\Facades\DB;
use Auth;

class PostProController extends Controller
{
    public function index(Request $request)
    {
    	$skills = Skills::all();
    	$projects=Project::paginate(20);

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
        
    	return view('free.showproject', compact('skills'), compact('projects'));
    }

    public function openpro($id)
    {
    	$dispro=Project::whereId($id)->first();
        $bidcheck = SubmitBid::where('job_id', $id);
        $files = File::all();

    	return view('free.specificpro', compact('dispro'), compact('bidcheck'))->with(compact('files'));
    }

    public function submitbid(Request $request)
    {
        $bid = new SubmitBid;

        $bid->job_id = $request->displaynone;
        $bid->user_id = Auth::user()->id;
        $bid->amount = $request->amount;
        $bid->days = $request->deliver;
        $bid->review = $request->description;
        $bid->save();

        $notification = array(
                'message' => 'Your Bid has been Successfully',
                'alert-type' => 'success',
            );

        return redirect('/dashboard')->with($notification);
    }

    public function search(Request $request)
    {
    	if ($request->ajax()) {
    		$output="";
    		$searchs = DB::table('post_project')->where('category','LIKE','%'.$request->search.'%')
    								 ->orWhere('project_name', 'LIKE','%'.$request->search.'%')
    								 ->orWhere('skills', 'LIKE','%'.$request->search.'%')
    								 ->orWhere('budget_from', 'LIKE','%'.$request->search.'%')
    								 ->orWhere('budget_to', 'LIKE','%'.$request->search.'%')->get();
    		if ($searchs) {
    			foreach ($searchs as $key => $searcher) {
    				$output.='<tr>'.
    							'<td class="lalign col-md-5 col-sm-5 col-xs-5">'.'<h5>'.$searcher->project_name.
    							'</h5>'.'<p class="dis">'.$searcher->description.'</p>'.'<p>Project Category: '.$searcher->category.'</p>'.'<p>Skills: '.$searcher->skills.'</p>'.
    							'</td>'.
    							'<td class="col-md-4 col-sm-4 col-xs-4">'.$searcher->skills.'</td>'.
    							'<td class="col-md-3 col-sm-3 col-xs-3"><h5><i class="fa fa-inr" aria-hidden="true"></i>'.$searcher->budget_from.'-'.$searcher->budget_to.'</h5>'.'</td>'.
    						 '</tr>';
    			}
    			return Response($output);
			}						 
    	}
    }
	
	public function skillsearch(Request $request)
    {
    	if ($request->ajax()) {
    		$output="";
    		$skillsearch = DB::table('post_project')->where('skills','LIKE','%'.$request->get('skills_multiple[]').'%')->get();
    		if ($skillsearch) {
    			foreach ($skillsearch as $key => $searcher) {
    				$output.='<tr>'.
    							'<td class="lalign col-md-5 col-sm-5 col-xs-5">'.'<h5>'.$searcher->project_name.
    							'</h5>'.'<p class="dis">'.$searcher->description.'</p>'.'<p>Project Category: '.$searcher->category.'</p>'.'<p>Skills: '.$searcher->skills.'</p>'.
    							'</td>'.
    							'<td class="col-md-4 col-sm-4 col-xs-4">'.$searcher->skills.'</td>'.
    							'<td class="col-md-3 col-sm-3 col-xs-3">'.'<h5>'.'<i class="fa fa-inr" aria-hidden="true"></i>'.$searcher->budget_from.'-'.$searcher->budget_to.'</h5>'.'</td>'.
    						 '</tr>';
    			}
    			return Response($output);
			}						 
    	}
    }
}
