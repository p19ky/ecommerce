<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function get_all(){
        $users= User::all();
        return view('admin.users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'usertype' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        //$user->create($request->all());  
        $user= new User;
            
            $user->role_id= $request->usertype;
            $user->firstName= $request->firstName;
            $user->lastName= $request->lastName;
            $user->username= $request->username;
            $user->email= $request->email;
            $user->password= $request->password;
            $user->save();

            return redirect(route('admin.create'))->with('successMsg', 'User successfully added to the database');

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
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edit',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'usertype' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required',
            'email' => 'required',
            // 'password' => 'required',

        ]);

        
        $user= User::find($id);
            
            $user->role_id= $request->usertype;
            $user->firstName= $request->firstName;
            $user->lastName= $request->lastName;
            $user->username= $request->username;
            $user->email= $request->email;
            // $user->password= $request->password;
            $user->save();

            return redirect(route('admin.users'))->with('successMsg', 'User successfully updated to the database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect(route('admin.users'))->with('successMsg', 'User successfully deleted from the database');

    }
}
