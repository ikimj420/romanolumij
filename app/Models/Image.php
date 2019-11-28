<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    //BelongsTo
    public function album()
    {
        return $this->belongsTo(\App\Models\Album::class, 'album_id');
    }

    //BelongsTo
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
