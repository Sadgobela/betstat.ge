<?php

namespace App\Http\Requests\Admin\Leagues;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'order' => ['nullable', 'numeric'],
            'active' => ['boolean'],
            'image' => ['nullable', 'image'],
            'order_type' => ['string'],
            'type' => ['string', 'required'],

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
