<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Promo extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'title',
        'category1',
        'category2',
        'casinoName',
        'rating',
        'text',
        'logo',
        'image',
        'video',
        'button',
    ];
}
