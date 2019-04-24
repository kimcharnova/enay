<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotherController extends Controller
{
    public function index()
    {
    	$mother = Mother::all();
    	return view('mother.index', compact('mother', $mother));
    }
}
