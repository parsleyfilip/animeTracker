<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = [
        'mal_id', 'title', 'image_url', 'score', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
