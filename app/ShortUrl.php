<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShortUrl extends Model
{   
    use SoftDeletes;

    protected $table      = 'short_urls';
    protected $primaryKey = 'id';

    protected $dates = ['created_at', 'updated_at'];

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function scopeSearch($query, $term)
    {
        $query->select('short_urls.*');

        if(empty($term)){

            return  $query;

        }else {

            $query->where(function($query) use($term)
            {
                $query->orWhere('short_urls.id', 'like', "%{$term}%");
                $query->orWhere('short_urls.code', 'like', "%{$term}%");
                $query->orWhere('short_urls.description', 'like', "%{$term}%");
                $query->orWhere('short_urls.link', 'like', "%{$term}%");
            });

        }

    }
}
