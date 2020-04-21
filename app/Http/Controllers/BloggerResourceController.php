<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;
use App\User;

class BloggerResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloggers = DB::table('users')->where('role','blogger')->get(); 
        return view('superuserpages.manageBloggers')->withBloggers($bloggers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superuserpages.createBloggers');
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
        $blogger = new User;
        $blogger->name = $request->name;
        $blogger->email = $request->email;
        $blogger->number = $request->number; 
        $blogger->role = $request->role; 
        $blogger->password = Hash::make($request->input('password'));   
        $blogger->save();
        //flash sessions are used when you want the output to come after only one page request
        //Session::flash('key','value')
        Session::flash('success','The blogger was successfully saved!');
        //redirect to another page
        return redirect()->route('bloggers.show',$blogger->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bloggers = User::find($id);
        return view('superuserpages.viewBlogger')->withBloggers($bloggers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloggers = User::find($id); 
        return view('superuserpages.editBloggers')->withBlogger($bloggers);
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
        $bloggers = User::find($id);
        $this->validate($request, array(
          'name'=>'required|max:255',
          'email'=>'required|max:255|email',
          'number'=>'required|max:10'
        ));
        //save the data to the database
         $blogger = User::find($id);
         $blogger->name = $request->input('name');
         $blogger->email = $request->input('email');
         $blogger->number = $request->input('number');
         $blogger->save();
        //set flash data with success message
        Session::flash('success','This Blogger was successfully updated.');
        //redirect with flash data in superuserpages.viewBlogger
        return redirect()->route('bloggers.show',$blogger->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find blogger in the database and save it in a variable
        $bloggers = User::find($id);
        //delete method
        $bloggers->delete();
        //set flash data with success message
        Session::flash('success','This blogger was successfully deleted.');
        //redirect to the manage page
        return redirect()->route('bloggers.index');
    }
}
