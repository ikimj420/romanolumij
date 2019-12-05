<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Support\Str;
use Laravelista\Comments\Commentable;

class Story extends Model
{
    use Taggable;
    use Commentable;

    protected $guarded = [];


    //BelongsTo
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    //BelongsTo
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    //url pathTitle
    public function pathTitle()
    {
        return url("/story/{$this->id}-".Str::slug($this->title, '_'));
    }

    //url pathAlav
    public function pathAlav()
    {
        return url("/story/{$this->id}-".Str::slug($this->alav, '_'));
    }

    //url storyPics
    public function storyPics()
    {
        return asset('/storage/stories/'.$this->pics);
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
