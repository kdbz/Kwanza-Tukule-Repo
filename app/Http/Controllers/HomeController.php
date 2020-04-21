<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // User role
    $role = Auth::user()->role; 
    
    // Check user role
    switch ($role) {
        case 'admin':
         return view('adminpages.dashboard');
        break; 
        case 'blogger':
                return view('posts.index');
        break; 
        case 'superuser':
                return view('superuserpages.dashboard');
        break; 
        default:
                return view('pages/welcome'); 
            break;
                
    }
}

}