<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skills;
use Validator;

class AdminSkillsController extends Controller
{
    public function admin_skills()
    {
    	$skills = Skills::all();
    	return view('admin.adminskills')->with(compact('skills'));
    }

    public function editItem(Request $request)
    {
        $skills = Skills::find($request->id);
        $skills->name = $request->name;
        $skills->save();

        $notification = array(
            'message' => 'Skill Updated Successfully',
            'alert-type' => 'success',
        );

        return response()->json($skills)->with($notification);
    }

    public function deleteItem(Request $request) {
      Skills::find($request->id)->delete();

      $notification = array(
            'message' => 'Skill Deleted Successfully',
            'alert-type' => 'success',
        );

      return response()->json()->with($notification);
    }

    public function adminskillsregister(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'name' => 'bail|required|max:255|unique:skills_category,name',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'Sorry! We Found Some Errors. Plese Rectify them.',
                'alert-type' => 'error',
            );

            return redirect('/adminskills')
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $skills = new Skills;
            
            $skills->name = $request->name;
            $skills->save();

            $notification = array(
                    'message' => 'Skill Added Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);
        }
    }
}
