<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['course_id', 'title', 'content', 'order', 'is_free', 'tier'];

    protected $casts = [
        'is_free' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
