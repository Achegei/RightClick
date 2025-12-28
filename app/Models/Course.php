<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Concerns\HasTierAccess;
use App\Models\Program;
use App\Models\Lesson;

class Course extends Model
{
    use HasFactory, HasTierAccess;

    protected $fillable = [
        'program_id',
        'title',
        'slug',
        'description',
        'tier',
    ];

    protected static function booted()
    {
        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);
            }
        });
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }
}
