<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Slider extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'slider';
    protected $fillable = [
        'title',
        'input1',
        'input2',
        'input3',
        'input4',
        'image',
    ];
}
