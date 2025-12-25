<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'duration_days', 'description'];

    // Courses in this program
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // Users enrolled in this program
    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withTimestamps()
                    ->withPivot('expires_at');
    }
}
