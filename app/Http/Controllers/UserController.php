<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function showuserdetails()
    {
        $username = Auth::user()->name;
        $useremail = Auth::user()->email;
        return view("users.profile",compact('username','useremail'));
    }

    public function updateusername(Request $request)
    {
        $user = new User;
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->username;
        $user->update();
        return redirect('/post')->with('status', 'UserName Updated Successfully!');
    }
}
