<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    protected $fillable = [
        'name',
        'active'
    ];

    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class);
    }
}
