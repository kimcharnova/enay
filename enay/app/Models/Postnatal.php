<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postnatal extends Model
{
    protected $fillable = [
    	'dateOfVisit',
    	'condition',
    	'pregnancyid',
    	'personnelid',	
    ];
}
