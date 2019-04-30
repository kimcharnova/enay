<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildVisit extends Model
{
    protected $fillable = [
    	'dateOfVisit',
    	'currentAge',
    	'diagnosis',
    	'nextVisit',
    	'childid',
    	'personnelid',
    ];
}
