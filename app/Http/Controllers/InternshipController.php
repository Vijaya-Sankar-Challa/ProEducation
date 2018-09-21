<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipCategory;
use Validator;
use App\InternshipRequest;
use App\InternshipDetails;
use App\InternshipDepartment;

class InternshipController extends Controller
{
    public function index()
    {
    	$intern_cats = InternshipCategory::all();
        $intern_deps = InternshipDepartment::all();
    	return view('internship.internship')->with(compact('intern_cats'))
                                            ->with(compact('intern_deps'));
    }

    public function internshipformrequest(Request $request)
    {
    	$validator = Validator::make($request->all(),[
                'name' => 'required|max:255',
                'email' => 'required|max:255|email',
                'collage' => 'required|max:255',
                'phone_number' => 'required|regex:/[0-9]{10}/',
                'year' => 'required|integer|between:0,5',
                'Accommodation' => 'required|integer|between:0,1',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'Sorry! We found Some Errors. Please rectify them.',
                'alert-type' => 'error',
            );

            return back()
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $intern_form = new InternshipRequest;
            
            $intern_form->name = $request->name;
            $intern_form->collage = $request->collage;
            $intern_form->email = $request->email;
            $intern_form->phone_number = $request->phone_number;
            $intern_form->year = $request->year;
            $intern_form->internship_category_id = $request->internship_category_id;
            $intern_form->department = $request->department;
            $intern_form->Accommodation = $request->Accommodation;
            $intern_form->save();

            $notification = array(
                    'message' => 'Your Request has been submitted Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);
        }
    }

    public function internshipdetails($intcatid)
    {
    	$intern_details = InternshipDetails::all();
    	$intern_cat = InternshipCategory::where('id', $intcatid)->first();

    	$url_id = $intcatid;

    	return view('internship.internshipdetails')->with(compact('intern_details'))
    												->with(compact('url_id'))
    												->with(compact('intern_cat'));
    }

    public function internshipfulldetails($intcatid, $intdetid)
    {
    	$intern_full_details = InternshipDetails::where('id', $intdetid)->first();
    	$interns_cat = InternshipCategory::where('id', $intcatid)->first();
    	$intern_cats = InternshipCategory::all();
        $intern_deps = InternshipDepartment::all();
    	$url_id = $intdetid;

    	return view('internship.internshipfulldetails')->with(compact('intern_full_details'))
    												->with(compact('url_id'))
    												->with(compact('interns_cat'))
                                                    ->with(compact('intern_deps'))
    												->with(compact('intern_cats'));
    }
}
