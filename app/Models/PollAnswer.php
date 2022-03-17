<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollAnswer extends Model
{
    protected $fillable = [
        'answer',
        'poll_question_id',
    ];

    public function pollQuestion(): BelongsTo
    {
        return $this->belongsTo(PollQuestion::class, 'poll_question_id');
    }

    public function calcAnswerCount($total): float
    {
        return ($total == 0) ? 0 : round($this->count / $total * 100, 2);
    }
}
