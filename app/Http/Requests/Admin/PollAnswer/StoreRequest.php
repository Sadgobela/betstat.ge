<?php

namespace App\Http\Requests\Admin\PollAnswer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'answer' => ['required', 'string', 'max:255'],
            'poll_question_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
