<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class P2p extends Model
{
    use HasFactory, Notifiable, SoftDeletes;


    protected $table = 'p2p';
    protected $fillable = [
        'casino',
        'userName',
        'amount',
        'coefficient',
        'date',
        'cat'
    ];
}
