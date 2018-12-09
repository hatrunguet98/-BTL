<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'admin_id','name', 'code', 'semester', 'status',
    ];
}
