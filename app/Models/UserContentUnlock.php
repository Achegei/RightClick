<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContentUnlock extends Model
{
    protected $fillable = ['user_id', 'content_type', 'content_id', 'unlocked_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
