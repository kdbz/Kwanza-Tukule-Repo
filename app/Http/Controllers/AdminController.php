<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Meal;
use Session;
use App\Recipe;
use App\Charts\BarChart;
use App\Charts\DoughnutChart;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locations = DB::table('orders')->where('checked','0')->get(); 
        return view('adminpages.dashboard')->withLocations($locations);
    }
    public function getDeliverers()
    {
        $deliverers = DB::table('employees')->where('category','Driver')->get(); 
        return view('adminpages.drivers')->withDeliverers($deliverers);
    }
    public function getCleaners()
    {
        $cleaners = DB::table('employees')->where('category','Cleaner')->get(); 
        return view('adminpages.cleaners')->withCleaners($cleaners);
    }
    public function addCleaner()
    {
        return view('adminpages.addCleaner');
    }
    public function addCook()
    {
        return view('adminpages.addCook');
    }
    public function addDriver()
    {
        return view('adminpages.addDriver');
    }
    public function getCooks()
    {
        $cooks = DB::table('employees')->where('category','Cook')->get(); 
        return view('adminpages.cooks')->withCooks($cooks);
    }
    public function getStock()
    {
         $stock = DB::table('order_details')->get();
        return view('adminpages.stock')->withStock($stock);
    }
    public function getOrders()
    {
        $billing = DB::table('payments')->latest('created_at')->get();
        $orders = DB::table('orders')->where('checked','0')->get();
        return view('adminpages.customerOrders')->withOrders($orders)->withBilling($billing);
    }
    public function getReports()
    {
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        
       $dataOrders = collect([]); 
     for ($days_backwards = 6; $days_backwards >= 0; $days_backwards--) {
    $dataOrders->push(Order::whereDate('created_at', today()->subDays($days_backwards))->count());
     }
        $beans = \App\Meal::with('Order')->where('meal_name','Beans')->first(); 
        $cabbages = \App\Meal::with('Order')->where('meal_name','Cabbage')->first();
        $sukuma = \App\Meal::with('Order')->where('meal_name','Sukuma Wiki')->first();
        $ugali = \App\Meal::with('Order')->where('meal_name','Ugali')->first();
        $beef = \App\Meal::with('Order')->where('meal_name','Beef')->first();
         

        $bar = new BarChart;
        $bar->labels(['6 days ago','5 days ago','4 days ago','3 days ago','2 days ago', 'Yesterday', 'Today']);
        $bar->dataset('Number of orders for the past one week', 'bar', $dataOrders)->color($borderColors)->backgroundcolor($fillColors);

        $doughnut = new DoughnutChart;
        $doughnut->labels(['Beans','Cabbages','Sukuma Wiki','Ugali','Beef']);
        $doughnut->dataset('Fast Moving Meals','doughnut',[$beans->quantity, $cabbages->quantity,$sukuma->quantity,$ugali->quantity,$beef->quantity])->color($borderColors)->backgroundcolor($fillColors);

       

        return view('adminpages.reports', compact('bar','doughnut','line'));
    }
}


