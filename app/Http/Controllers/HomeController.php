<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Http\Controllers\Controller;


class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ((auth()->user()->name=='Admin') && (stripos(auth()->user()->email,'admin')!==false)) {
            $ads = DB::table('ads')->get();
            return view('home', compact('ads'));
        }

          $ads = DB::table('ads')->where('user_id', '=', auth()->user()->id)->orderBy('Created_at', 'DESC')->get();

           return view('home', compact('ads'));
           
    }

     
   
}
