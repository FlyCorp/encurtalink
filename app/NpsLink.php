<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NpsLink extends Model
{

    protected $table      = 'nps_links';
    protected $primaryKey = 'id';

    protected $dates = ['created_at', 'updated_at', 'voted_at', 'order_date', 'config_process_in'];

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        static::created(function(NpsLink $nps){
            $nps->uuid = crc32($nps->id);
            $nps->save();
        });

        static::updated(function(NpsLink $nps){
            // Obtenha os valores originais
            $old = $nps->getOriginal();

            if ($nps->vote && isset($old) && array_key_exists("vote", $old) && ($old["vote"] != $nps->vote)){
                $nps->voted_at = now()->format("Y-m-d H:i");
            }
        });
    }

    public function scopeSearch($query, $term)
    {
        $query->select('nps_links.*');

        if(empty($term)){

            return  $query;

        }else {

            $query->where(function($query) use($term)
            {
                $query->orWhere('nps_links.id', 'like', "%{$term}%");
                $query->orWhere('nps_links.campaign_name', 'like', "%{$term}%");
                $query->orWhere('nps_links.client_name', 'like', "%{$term}%");
                $query->orWhere('nps_links.client_document', 'like', "%{$term}%");
                $query->orWhere('nps_links.order_company', 'like', "%{$term}%");
                $query->orWhere('nps_links.order_number', 'like', "%{$term}%");
                $query->orWhere('nps_links.config_number', 'like', "%{$term}%");
            });

        }

    }
}
