<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table      = 'users';
    protected $primaryKey = 'id';
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
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
