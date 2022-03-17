<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PollQuestion extends Model
{
    protected $fillable = [
        'image',
        'question',
        'active'
    ];

    public function pollAnswers(): HasMany
    {
        return $this->hasMany(PollAnswer::class, 'poll_question_id');
    }

    public function pollAnswersCountSum($answers): int
    {
        return $answers->sum('count');
    }
}
