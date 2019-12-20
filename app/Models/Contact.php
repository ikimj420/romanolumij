<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    protected $guarded = [];

    //BelongsTo
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    //url pathTitle
    public function pathTitle()
    {
        return url("/contact/{$this->id}-".Str::slug($this->subject, '_'));
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
