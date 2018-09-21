<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipDepartment;
use Validator;


/**
* 
*/
class AdminInternshipDepartmentController extends Controller
{
	public function index()
	{
		$intern_deps = InternshipDepartment::all();

		return view('admin.admininternshipdep')->with(compact('intern_deps'));
	}

	public function editItem(Request $request)
    {
        $intern_deps = InternshipDepartment::find($request->id);
        $intern_deps->internship_department = $request->name;
        $intern_deps->save();

        $notification = array(
            'message' => 'Internship Department Updated Successfully',
            'alert-type' => 'success',
        );

        return response()->json($intern_deps)->with($notification);
    }

    public function deleteItem(Request $request) 
    {
      	InternshipDepartment::find($request->id)->delete();

        $notification = array(
            'message' => 'Internship Department Deleted Successfully',
            'alert-type' => 'success',
        );

      	return response()->json()->with($notification);
    }

    public function admininterndepregister(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'internship_department' => 'required|max:255|unique:internship_department,internship_department',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'We found some errors! Please rectify them.',
                'alert-type' => 'error',
            );

            return redirect('/admininterndep')
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $intern_deps = new InternshipDepartment;
            
            $intern_deps->internship_department = $request->internship_department;
	        $intern_deps->save();

            $notification = array(
                    'message' => 'Internship Department Created Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);;
        }
    }
}