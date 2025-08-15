<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'fname',
        'lname',
        'email',
    ];

    /**
     * Get the courses that the student is enrolled in.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')
                    ->withTimestamps();
    }

    /**
     * Get the student's full name.
     */
    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }
}
