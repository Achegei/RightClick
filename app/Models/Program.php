<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasTierAccess;
use App\Models\Course;
use App\Models\User;

class Program extends Model
{
    use HasFactory, HasTierAccess;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'duration_days',
        'description',
        'tier',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withTimestamps()
                    ->withPivot('expires_at');
    }
}
