<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{

    protected $table = 'mother';
    
    protected $fillable = [
    	'fname',
    	'mname',
    	'lname',
    	'phone',
    	'houseno',
    	'purokid',
    	'barangayid',
    	'cityid',
    	'longitude',
    	'latitude',
    	'bloodtype',
    	'height',
    	'edu',
    ];
}
