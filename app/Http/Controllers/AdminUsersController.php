<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Project;
use App\SubmitBid;
use Auth;

class AdminUsersController extends Controller
{
    public function adminusers()
    {
    	$users = User::all();
    	return view('admin.adminusers')->with(compact('users'));
    }

    public function admin_projects_posted()
    {
        $projects = Project::all();
        return view('admin.adminpostproject')->with(compact('projects'));
    }

    public function admin_bids()
    {
        $bids = SubmitBid::all();
        return view('admin.adminbids')->with(compact('bids'));
    }

    public function editItem(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success',
        );

         return response()->json($user)->with($notification);
    }

    public function deleteItem(Request $request) {
      User::find($request->id)->delete();

      $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success',
        );

      return response()->json()->with($notification);
    }

    public function adminregister(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'bail|required|max:255|unique:users,name',
                'email' => 'bail|required|email|max:255|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'phone_number' => 'required|max:255|unique:users,phone_number',
            ]);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'Oops! We Found Some Errors. Plese Rectify Them.',
                'alert-type' => 'error',
            );

            return redirect('/adminusers')
                        ->withErrors($validator)
                        ->with($notification)
                        ->withInput();
        }
        else{

            $user = new User;
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->role = $request->role;
            $user->password = bcrypt($request->password);
            $user->save();

            $notification = array(
                    'message' => 'User Created Successfully',
                    'alert-type' => 'success',
                );

            return back()->with($notification);
        }
    }
}
