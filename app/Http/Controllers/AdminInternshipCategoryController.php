<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipCategory;
use Validator;


/**
* 
*/
class AdminInternshipCategoryController extends Controller
{
	public function index()
	{
		$intern_cats = InternshipCategory::all();

		return view('admin.admininternshipcat')->with(compact('intern_cats'));
	}

	public function editItem(Request $request)
    {
        $intern_cats = InternshipCategory::find($request->id);
        $intern_cats->internship_category = $request->name;
        $intern_cats->save();

        $notification = array(
            'message' => 'Internship Category Updated Successfully',
            'alert-type' => 'success',
        );

        return response()->json($intern_cats)->with($notification);
    }

    public function deleteItem(Request $request) 
    {
      	InternshipCategory::find($request->id)->delete();
        $notification = array(
            'message' => 'Internship Category Created Successfully',
            'alert-type' => 'success',
        );
      	return response()->json()->with($notification);
    }

    public function admininterncatregister(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'internship_category' => 'required|max:255|unique:internship_categories,internship_category',
            ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Some errors are found! Please check it.',
                'alert-type' => 'error',
            );
            return redirect('/admininterncat')
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $intern_cats = new InternshipCategory;
            
            $intern_cats->internship_category = $request->internship_category;
	        $intern_cats->save();

            $notification = array(
                    'message' => 'Internship Category Created Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);;
        }
    }
}