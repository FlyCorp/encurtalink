<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkConfiguration extends Model
{
    use SoftDeletes;

    protected $table      = 'link_configuration';
    protected $primaryKey = 'id';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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
        $query->select('link_configuration.*');

        if(empty($term)){

            return  $query;

        }else {

            $query->where(function($query) use($term)
            {
                $query->orWhere('link_configuration.id', 'like', "%{$term}%");
                $query->orWhere('link_configuration.key', 'like', "%{$term}%");
                $query->orWhere('link_configuration.value', 'like', "%{$term}%");
                $query->orWhere('link_configuration.description', 'like', "%{$term}%");
            });

        }

    }
}
