<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravelista\Comments\Commenter;

class User extends Authenticatable
{
    use Notifiable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //check if auth user is Admin
    public function Admin()
    {
        return $this->role()->where('userLevel', 'Admin')->exists();
    }
    //check if auth user is Moderator
    public function Moderator()
    {
        return $this->role()->where('userLevel', 'Moderator')->exists();
    }

    //belongsTo
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    //HasMany
    public function albums()
    {
        return $this->hasMany(\App\Models\Album::class);
    }

    //HasMany
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class);
    }

    //HasMany
    public function poems()
    {
        return $this->hasMany(\App\Models\Poem::class);
    }

    //HasMany
    public function stories()
    {
        return $this->hasMany(\App\Models\Story::class);
    }

    //HasMany
    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class);
    }

    //url userPics
    public function userPics()
    {
        return asset('/storage/users/'.$this->avatar);
    }
}
