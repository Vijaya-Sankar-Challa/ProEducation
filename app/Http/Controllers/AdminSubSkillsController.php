<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubSkills;
use App\Skills;
use Validator;

class AdminSubSkillsController extends Controller
{
    public function admin_sub_skills()
    {
    	$subskills = SubSkills::all();
    	$skills = Skills::all();
    	return view('admin.adminsubskills')->with(compact('subskills'))
    										->with(compact('skills'));
    }

    public function editItem(Request $request)
    {
        $subskills = SubSkills::find($request->id);
        $subskills->name = $request->name;
        $subskills->skills_id = $request->skills_id;
        $subskills->save();

        $notification = array(
            'message' => 'Sub Skill Updated Successfully',
            'alert-type' => 'success',
        );

        return response()->json($subskills)->with($notification);
    }

    public function deleteItem(Request $request) {
      SubSkills::find($request->id)->delete();

      $notification = array(
            'message' => 'Sub Skill Deleted Successfully',
            'alert-type' => 'success',
        );

      return response()->json()->with($notification);
    }

    public function adminsubskillsregister(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'name' => 'bail|required|max:255|unique:skills,name',
                'skills_id' => 'required',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'Oops! We Found some errors!',
                'alert-type' => 'error',
            );

            return redirect('/adminsubskills')
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $subskills = new SubSkills;
            
            $subskills->name = $request->name;
            $subskills->skills_id = $request->skills_id;
            $subskills->save();

            $notification = array(
                    'message' => 'Sub Skill Created Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);
        }
    }
}
