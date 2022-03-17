<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Game extends Model
{
    use HasFactory, Notifiable, SoftDeletes;


    protected $table = 'sport_games';
    protected $fillable = [
        'date',
        'home_team',
        'away_team',
        'type',
        'cat',
        'link',
        'end_date'
    ];

    public function scopeActive(Builder $builder)
    {
        $builder
            ->where('end_date', '>=', now()->toDateTimeString());
    }
}
