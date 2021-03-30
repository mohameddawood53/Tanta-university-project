<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    protected $fillable = [
        "date","max_number"
    ];
}
