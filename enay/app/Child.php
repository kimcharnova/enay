<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
    	'fname',
    	'lname',
    	'dob',
    	'deliveryid',
    	'childorder',
    	'dateRegistered',
    	'gender',
    ];
}
