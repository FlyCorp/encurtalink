<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{   
    use SoftDeletes;
    use Notifiable;

    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [
        'created_at',
        'updated_at',
    ];
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

    public function scopeSearch($query, $term)
    {
        $query->select('users.*');

        if(empty($term)){

            return  $query;

        }else {

            $query->where(function($query) use($term)
            {
                $query->orWhere('short_urls.id', 'like', "%{$term}%");
                $query->orWhere('short_urls.name', 'like', "%{$term}%");
                $query->orWhere('short_urls.email', 'like', "%{$term}%");
            });

        }

    }
}
