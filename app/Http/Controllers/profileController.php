<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\Skills;
use App\User;

class profileController extends Controller
{
    //
    public function profile(Request $request)
    {
        $skills = Skills::all();
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

        $user = Auth::user();
        $user->visitor = $request->ip();
        $user->save();

        return view('user.profile', array('user' => Auth::user() ), compact('skills'));
    }

    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
    	   // Handle the user upload of Avatar
    		$avatar = $request->file('avatar');
            $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save(public_path('images/uploads/avatars/' . $filename));

            $user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
        }
    	return redirect('/profile');

    }

    public function editintro(Request $request)
    {
        $user = Auth::user();
        $user->intro = $request->intro;
        $user->visitor = $request->ip();
        $user->save();

        return redirect('/dashboard');

    }

    public function userprofiles($username)
    {
        $user = User::where('name', $username)->first();

        $skills = Skills::all();

        return view('user.allprofile')->with(compact('user'))
                                      ->with(compact('skills'));
    }
}