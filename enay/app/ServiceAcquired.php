<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceAcquired extends Model
{
    protected $fillable = [
    	'serviceid',
    	'reference',
    ];
}
