<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Role;
use Auth;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.profile')->with('user', Auth::user());
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'street' => 'required',
            'number' => 'required',
            //'building' => 'required',
            'apartment' => 'required',
            'city' => 'required',
            'county' => 'required',
           
        ]);

        $user= Auth::user();
        
        $user->firstName= $request->firstName;
        $user->lastName= $request->lastName;
        $user->username= $request->username;
        $user->email= $request->email;
        // $user->password= $request->password;
        $user->street= $request->street;
        $user->number= $request->number;
        $user->building= $request->building;
        $user->apartment= $request->apartment;
        $user->city= $request->city;
        $user->county= $request->county;
        $user->save();

        return redirect(route('admin.profile'))->with('successMsg', 'User successfully updated to the database');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
