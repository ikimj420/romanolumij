<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Support\Str;
use Laravelista\Comments\Commentable;

class Blog extends Model
{
    use Taggable;
    use Commentable;

    protected $guarded = [];

    //BelongsTo
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    //url pathTitle
    public function pathTitle()
    {
        return url("/blog/{$this->id}-".Str::slug($this->title, '_'));
    }

    //url blogPics
    public function blogPics()
    {
        return asset('/storage/blogs/'.$this->pics);
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
