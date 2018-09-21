<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectCategories;
use Validator;

class AdminProjectCategoryController extends Controller
{
    public function admin_procat()
    {
    	$procats = ProjectCategories::all();
    	return view('admin.adminprojectcategory')->with(compact('procats'));
    }

    public function editItem(Request $request)
    {
        $procat = ProjectCategories::find($request->id);
        $procat->name = $request->name;
        $procat->save();

        $notification = array(
            'message' => 'Project Category Updated Successfully',
            'alert-type' => 'success',
        );

        return response()->json($procat)->with($notification);
    }

    public function deleteItem(Request $request) {
      ProjectCategories::find($request->id)->delete();

      $notification = array(
            'message' => 'Project Category Deleted Successfully',
            'alert-type' => 'success',
        );

      return response()->json()->with($notification);
    }

    public function adminprocatregister(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'name' => 'bail|required|max:255|unique:project_category,name',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'We found some errors! Please rectify them',
                'alert-type' => 'error',
            );

            return redirect('/adminprocat')
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $procat = new ProjectCategories;
            
            $procat->name = $request->name;
            $procat->save();

            $notification = array(
                    'message' => 'Project Category Added Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);
        }
    }
}
