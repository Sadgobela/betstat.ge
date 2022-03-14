<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Poker extends Model
{
    use HasFactory, Notifiable, SoftDeletes;


    protected $table = 'poker';
    protected $fillable = [
        'casino',
        'picture',
        'date',
        'tournament',
        'amount',
        'prize',
    ];
}
