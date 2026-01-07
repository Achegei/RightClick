<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'price',
    ];
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
