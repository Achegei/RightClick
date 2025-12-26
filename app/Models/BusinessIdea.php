<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessIdea extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'content',
        'is_premium',
        'status',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}