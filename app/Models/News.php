<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'category',
        'date',
        'picture',
        'title',
        'text',
        'video',
        'slider',
        'main',
    ];
}