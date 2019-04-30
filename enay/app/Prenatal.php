<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prenatal extends Model
{
    protected $fillable = [
    	'pregnancyid',
    	'dateOfVisit',
    	'trimesterno',
    	'gestationalage',
    	'weight',
    	'bloodpressure',
    	'nextVisit',
    	'personnelid',
    ];
}
