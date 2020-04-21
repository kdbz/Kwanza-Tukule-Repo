<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;
use App\User;

class AdminResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = DB::table('users')->where('role','admin')->get(); 
        return view('superuserpages.manageAdmins')->withAdmins($admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superuserpages.createAdmins');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
          'name'=>'required|max:255',
          'email'=>'required|max:255|email|unique:users',
          'number'=>'required|max:10',
          'password'=>'required|min:8'
        ));
        //store in the database
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->number = $request->number;
        $admin->role = $request->role; 
        $admin->password = Hash::make($request->input('password'));
        $admin->save();
        //flash sessions are used when you want the output to come after only one page request
        //Session::flash('key','value')
        Session::flash('success','The administrator was successfully saved!');
        //redirect to another page
        return redirect()->route('admins.show',$admin->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admins = User::find($id);
        return view('superuserpages.viewAdmin')->withAdmins($admins);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = User::find($id); 
        return view('superuserpages.editAdmins')->withAdmins($admins);
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
        $admins = User::find($id);
        $this->validate($request, array(
          'name'=>'required|max:255',
          'email'=>'required|max:255|email',
          'number'=>'required|max:10'
        ));
        //save the data to the database
         $admin = User::find($id);
         $admin->name = $request->input('name');
         $admin->email = $request->input('email');
         $admin->number = $request->input('number');
         $admin->save();
        //set flash data with success message
        Session::flash('success','This administrator was successfully updated.');
        //redirect with flash data in superuserpages.viewAdmin
        return redirect()->route('admins.show',$admin->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find admin in the database and save it in a variable
        $admin = User::find($id);
        //delete method
        $admin->delete();
        //set flash data with success message
        Session::flash('success','This administrator was successfully deleted.');
        //redirect to the manage page
        return redirect()->route('admins.index');
    }
}
