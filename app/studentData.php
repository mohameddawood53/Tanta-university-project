<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentData extends Model
{
    protected $fillable = [
        'name','email','national_id','phone_num','faculty','date'
    ];
}
