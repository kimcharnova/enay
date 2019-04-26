<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
    	'pregnancyid',
    	'attendantType',
    	'birthplace',
    	'birthweight',
    	'birthlength',
    	'birthtype',
    ];
}
