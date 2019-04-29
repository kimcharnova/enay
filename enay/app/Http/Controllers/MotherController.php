<?php

namespace App\Http\Controllers;

use App\Mother;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MotherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mother  $mother
     * @return \Illuminate\Http\Response
     */
    public function show(Mother $mother)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mother  $mother
     * @return \Illuminate\Http\Response
     */
    public function edit(Mother $mother)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mother  $mother
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mother $mother)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mother  $mother
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mother $mother)
    {
        //
    }

    public function searchMother()
    {
        $mom = Input::get('mom');
        $mother = Mother::where('fname', 'LIKE', '%'.$mom.'%')->orWhere
        ('email', 'LIKE', '%'.$mom.'%')->orWhere('lname','LIKE','%'.$mom.'%')->get();
        if(count($mother) > 0)
            return view('layouts.mother')->withDetails($mother)->withQuery($mom);
        else
            return view('layouts.mother')->withMessage('No details found.');
    }

    public function showMaternalCard(){
        return view('layouts.mother');
    }
}
