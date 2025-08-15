<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the course that this professor teaches.
     */
    public function course()
    {
        return $this->hasOne(Course::class);
    }

    /**
     * Check if the professor is currently teaching a course.
     */
    public function isTeaching()
    {
        return $this->course()->exists();
    }

    /**
     * Scope to get professors not currently teaching.
     */
    public function scopeAvailable($query)
    {
        return $query->whereDoesntHave('course');
    }
} 