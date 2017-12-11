<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;

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
        $ratings = Rating::paginate(50);
        return view('home', ['ratings' => $ratings]);
    }
}
