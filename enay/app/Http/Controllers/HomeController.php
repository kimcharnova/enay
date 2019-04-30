<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
public function maternal() {
        return view('layouts.mother');
    }

    public function child() {
        return view('layouts.child');
    }

    public function analytics() {
        return view('layouts.analytics');
    }

    public function graph() {
        return view('layouts.graph');
    }

    public function map() {
        return view('layouts.map');
    }

}
