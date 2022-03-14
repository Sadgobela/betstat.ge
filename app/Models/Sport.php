<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Sport extends Model
{
    use HasFactory, Notifiable, SoftDeletes;


    protected $table = 'sport';
    protected $fillable = [
        'game_id',
        'casino',
        '1_c',
        'x',
        '2_c',
        '1x',
        '12_c',
        'x2',
        'less',
        'total',
        'more',
        'yes',
        'no',
        'fora_1',
        'fora_2',
        'fora',
    ];
}
