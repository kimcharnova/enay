<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    protected $fillable = [
    	'name',
    	'barangayid',
    ];
}
