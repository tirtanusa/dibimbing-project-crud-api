<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'title',
        'description',
        'price',
        'enrolled_count',
        'rating',
        'max_student',
        'current_student',
        'level',
        'status',
        'instructor_id',
        'category_id'
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

    protected $appends = [
        'formatted_price'
    ];

    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id'); //Memperjelas relasi, sehingga mempermudah ketika mengambil data dari users table
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function getFormattedPriceAttribute(){
        return 'Rp. ' . number_format($this->price, 0, ',', ".");
    }
}
