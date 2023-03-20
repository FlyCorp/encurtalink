<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Presenters\UserPresenter;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use UserPresenter;

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
                $query->orWhere('users.id', 'like', "%{$term}%");
                $query->orWhere('users.name', 'like', "%{$term}%");
                $query->orWhere('users.email', 'like', "%{$term}%");
            });

        }

    }
}
