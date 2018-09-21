<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipDetails;
use App\InternshipDepartment;
use App\InternshipCategory;
use Validator;
use Illuminate\Support\Facades\Input;


/**
* 
*/
class AdminInternshipDetailsController extends Controller
{
	public function index()
	{
		$intern_dets = InternshipDetails::all();
        $intern_deps = InternshipDepartment::all();
        $intern_cats = InternshipCategory::all();

		return view('admin.admininternshipdet')->with(compact('intern_dets'))
                                                ->with(compact('intern_deps'))
                                                ->with(compact('intern_cats'));
	}

	public function editItem(Request $request)
    {
        $intern_deps = InternshipDetails::find($request->id);
        $intern_deps->internship_department = $request->name;
        $intern_deps->save();

        $notification = array(
            'message' => 'Internship Details Updated Successfully',
            'alert-type' => 'success',
        );

        return response()->json($intern_deps)->with($notification);
    }

    public function deleteItem(Request $request) 
    {
      	InternshipDepartment::find($request->id)->delete();

        $notification = array(
            'message' => 'Internship Details Deleted Successfully',
            'alert-type' => 'success',
        );

      	return response()->json()->with($notification);
    }

    public function admininterndetregister(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'introduction' => 'required',
                'accommodation_fee' =>'required',
                'highlights' => 'required',
                'who_can_attend' => 'required',
                'payment_procedure' => 'required',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'We found some errors! Please rectify them.',
                'alert-type' => 'error',
            );

            return redirect('/admininterndet')
                        ->with($notification)
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $intern_dets = new InternshipDetails;

            $intern_dets->internship_category_id = $request->internship_category_id;
            $intern_dets->title = $request->title;
            $intern_dets->powered_by = $request->powered_by;
            $intern_dets->introduction = $request->input('introduction');
            $intern_dets->location = $request->location;
            $intern_dets->dates = $request->dates;
            $intern_dets->venue = $request->venue;
            $intern_dets->contact_numbers = $request->contact_numbers;
            $intern_dets->accommodation_fee = $request->accommodation_fee;
            $intern_dets->highlights = $request->input('highlights');
            $intern_dets->who_can_attend = $request->input('who_can_attend');
            $intern_dets->payment_procedure = $request->input('payment_procedure');
	        $intern_dets->save();

            $notification = array(
                    'message' => 'Internship Details Created Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);
        }
    }
}