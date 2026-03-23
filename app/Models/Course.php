<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =[
        'title',
        'description',
        'price',
        'max_student',
        'current_student',
        'level',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
