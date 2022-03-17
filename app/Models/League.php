<?php

namespace App\Models;

use App\Ordering\Traits\HasOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use SoftDeletes, HasOrder;

    protected $fillable = [
        'image',
        'name',
        'order',
        'background_image',
        'type'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($league) {
            if(is_null($league->order)){
                $league->order = $league->ordering()->lastOrder();
            }
        });
    }
}
