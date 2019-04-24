<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    protected $fillable = [
    	'fname', 'mname', 'lname', 'email', 'phone', 'houseno', 'purokid', 'barangayid', 'cityid',
    ];


}
