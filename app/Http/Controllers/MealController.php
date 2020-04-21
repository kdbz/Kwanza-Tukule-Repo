<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Meal;
use App\Recipe;
use Session;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::with('recipes')->get(); 
        return view('adminpages.meals')->withMeals($meals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpages.mealsAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meals = $request->Name;
        //validate the data
        $this->validate($request, array(
          'Name'=>'required|max:30',
          'Category'=>'required|max:30'
        ));
        $meal = new Meal;
        $meal->category_id = $request->Category;
        $meal->meal_name = $meals;
        $meal->save();
         return redirect()->route('meals.edit',$meal->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::find($id);
        $meals=$meal->id;
        $details = \App\Meal::with('OrderDetails')->where('id',$meals)->first();
        $recipes = \App\Meal::with('recipes')->where('id',$meals)->first(); 
        return view ('adminpages.showMeal')->withMeal($meal)->withDetails($details)->withRecipes($recipes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $meal = Meal::find($id);
        return view ('adminpages.mealsAddNext')->withMeal($meal);
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
        $meal = Meal::find($id);
        //validate the data
        $this->validate($request, array(
          'ingredients'=>'required|min:5',
          'method'=>'required|min:5'
        ));
        $recipe = new Recipe;
        $recipe->meal_id = $request->meal_id;
        $recipe->ingredients = $request->ingredients;
        $recipe->method = $request->method;
        $recipe->save();
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
         $meal = Meal::find($id);
        //delete method
        $meal->delete();
        //set flash data with success message
        Session::flash('success','The meal package was successfully deleted.');
        //redirect to the index page
        return redirect('/meals');
    }
}
