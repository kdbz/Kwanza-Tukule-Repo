<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class SuperuserController extends Controller
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
        return view('superuserpages.dashboard');
    }

    public function admin()
    {
        $admins = DB::table('users')->where('role','admin')->get(); 
        return view('superuserpages.manageAdmins')->withAdmins($admins);
    }

    public function blogger()
    {
        $bloggers = DB::table('users')->where('role','blogger')->get(); 
        return view('superuserpages.manageBloggers')->withBloggers($bloggers);
    }
}


