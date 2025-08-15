<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'professor_id',
    ];

    /**
     * Get the students enrolled in this course.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')
                    ->withTimestamps();
    }

    /**
     * Get the professor teaching this course.
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    /**
     * Get the number of students enrolled in this course.
     */
    public function getEnrollmentCountAttribute()
    {
        return $this->students()->count();
    }
} 