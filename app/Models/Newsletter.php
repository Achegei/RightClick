<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter_subscribers';

    protected $fillable = [
        'name',
        'email',
    ];

    public $timestamps = true;
}
