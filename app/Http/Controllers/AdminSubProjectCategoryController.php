<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectSubCategories;
use App\ProjectCategories;
use Validator;

class AdminSubProjectCategoryController extends Controller
{
     public function admin_sub_procat()
    {
    	$subprocats = ProjectSubCategories::all();
    	$procats = ProjectCategories::all();
    	return view('admin.adminsubprojectcategory')->with(compact('subprocats'))
    										->with(compact('procats'));
    }

    public function editItem(Request $request)
    {
        $subprocat = ProjectSubCategories::find($request->id);
        $subprocat->name = $request->name;
        $subprocat->category_id = $request->category_id;
        $subprocat->save();

        $notification = array(
            'message' => 'Sub Project Category Updated Successfully',
            'alert-type' => 'success',
        );

        return response()->json($subprocat)->with($notification);
    }

    public function deleteItem(Request $request) {
      ProjectSubCategories::find($request->id)->delete();

      $notification = array(
            'message' => 'Sub Project Category Deleted Successfully',
            'alert-type' => 'success',
        );

      return response()->json()->with($notification);
    }

    public function adminsubprocatregister(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'name' => 'bail|required|max:255|unique:project_category_job,name',
                'category_id' => 'required',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'We found some errors! Please rectify them.',
                'alert-type' => 'error',
            );

            return redirect('/adminsubprocat')
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $subprocat = new ProjectSubCategories;
            
            $subprocat->name = $request->name;
            $subprocat->category_id = $request->category_id;
            $subprocat->save();

            $notification = array(
                    'message' => 'Sub Project Category Created Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);
        }
    }
}
