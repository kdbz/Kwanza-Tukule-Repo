<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
require  '../vendor/autoload.php'; 
use AfricasTalking\SDK\AfricasTalking;
use App\User;
use App\Order;
use App\Payment;
use Session;
use Auth;
class OrdersController extends Controller
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
       $this->validate($request, array(
          'quantity'=>'max:255',
          'value'=>'max:255'
        ));
        //store in the database
        $order = new Order;
        $order->customer_id = Auth::user()->id;
        $order->quantity = $request->quantity;
        $order->cost = $request->value;    
        $order->save();
         $totals = new Payment;
        $totals->customer_id = Auth::user()->id;
        $totals->totals = $request->totals;
        $totals->save();
        return redirect()->route('orders.edit',$order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view ('pages.confirm_details')->withOrder($order);
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
      $order = Order::find($id);
         $user = Auth::user();
       $number = $request->input('number');
       $location = $request->input('location');
       $this->validate($request, array(
          'number'=>'required',
          'location'=>'required'
        ));
        //store in the database
         $order = Order::find($id);
        $order->number = $request->number;
        $order->delivery_location = $request->location; 
        $order->customer_id = $user->id;
        $order->checked = '0';
        $order->save();
        $billing = DB::table('payments')->where('customer_id',Auth::user()->id)->latest('created_at')->first();
         $place = DB::table('orders')->where('delivery_location',$location)->first();
       return view ('pages.payment')->withUser($user)->withPlace($place)->withBilling($billing);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
