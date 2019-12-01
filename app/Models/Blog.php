<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
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
}
