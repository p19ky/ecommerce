<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.change');
    }

    public function changepassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hasedPassword= Auth::user()->password;
        if(Hash::check($request->oldpassword, $hasedPassword)){
            $user= User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('successMsg',"Password is change Succesessfully");
        }else{
            return redirect()->back()->with('errorMsg',"Current Password Is Invalid");

        }
    }
}
