<?php

namespace App\Http\Requests\Admin\Poll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
