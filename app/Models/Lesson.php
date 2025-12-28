<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'content',
        'order',
        'tier', // keep this if you still want tier-based access
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
