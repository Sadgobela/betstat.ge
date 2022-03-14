<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class H2h extends Model
{
    use HasFactory, Notifiable, SoftDeletes;


    protected $table = 'h2h';
    protected $fillable = [
        'game_id',
        'goals_1',
        'goals_2',
        'corners_1',
        'corners_2',
        'offsides_1',
        'offsides_2',
        'fouls_1',
        'fouls_2',
        'cards_1',
        'cards_2',
        'throw_1',
        'throw_2',
    ];
}
