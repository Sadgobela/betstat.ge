<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Statistic extends Model
{
    use HasFactory, Notifiable, SoftDeletes;


    protected $table = 'statistic';
    protected $fillable = [
        'game_id',
        'last',
        'court',
        'shots_goal_1',
        'shots_goal_2',
        'goal_attempts_1',
        'goal_attempts_2',
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
