<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'title',
        'slug',
        'description',
        'is_free',
    ];

    protected $casts = [
        'is_free' => 'boolean',
    ];

    /**
     * Auto-generate slug if not provided
     */
    protected static function booted()
    {
        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);
            }
        });
    }

    /**
     * Relationships
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }
}
