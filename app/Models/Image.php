<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    //url pathTitle
    public function pathTitle()
    {
        return url("/image/{$this->id}-".Str::slug($this->name, '_'));
    }

    //url imagePics
    public function imagePics()
    {
        return asset('/storage/photos/'.$this->pics);
    }

    //url pathProfile
    public function pathProfile()
    {
        return url("/profile/{$this->user['id']}-".Str::slug($this->user['username'], '_'));
    }

    //url userPics
    public function userPics()
    {
        return asset('/storage/users/'.$this->user['avatar']);
    }
}
