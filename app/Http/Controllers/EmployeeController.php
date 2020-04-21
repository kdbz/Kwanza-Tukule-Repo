<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Employee;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $employee = $request->Name;
        //validate the data
        $this->validate($request, array(
          'id'=>'required|max:30',
          'Name'=>'required|max:30',
          'number'=>'required|max:13',
          'category'=>'required|max:30',
          'duty'=>'required|max:30',
          'age'=>'required|max:2',
          'gender'=>'required|max:6',
          'salary'=>'required|max:8'
        ));
        $employee = new Employee;
        $employee->staff_id_no = $request->id;
        $employee->name = $request->Name;
        $employee->number = $request->number;
        $employee->category = $request->category;
        $employee->duty = $request->duty;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->salary = $request->salary;
        $employee->save();
        Session::flash('success','The employee was successfully saved!');
         return redirect('/admin'); 
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
        $employee = Employee::find($id);
        return view ('adminpages.editEmployees')->withEmployee($employee);
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
        $employee = Employee::find($id);
        //validate the data
        $this->validate($request, array(
          'id'=>'required|max:10',
          'category'=>'required|max:30',
          'duty'=>'required|max:30',
          'vehicle'=>'required|max:50',
          'number'=>'required|min:10|max:13',
          'age'=>'required|max:2',
          'gender'=>'required|min:4|max:6',
          'salary'=>'required|max:13'
        ));
        $employee = new Employee;
        $employee->staff_id_no = $request->id;
        $employee->category = $request->category;
        $employee->duty = $request->duty;
        $employee->vehicle = $request->vehicle;
        $employee->number = $request->number;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->salary = $request->salary;
        $employee->save();
         Session::flash('success','The meal has successfully been added');
        return redirect('/meals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        //delete method
        $employee->delete();
        //set flash data with success message
        Session::flash('success','The employee was successfully deleted.');
        //redirect to the index page
        return redirect('/admin');
    }
}
