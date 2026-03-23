<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'enrollment_id',
        'lesson_id',
        'status',
        'last_accessed',
        'completed_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function enrollment(){
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }

    public function lesson(){
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
