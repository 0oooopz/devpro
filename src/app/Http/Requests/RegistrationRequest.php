<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'phone'     => [
                'required',
                'numeric',
                'regex:/^\d{3,15}$/',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'phone' => 'Phone number must contains minimum 3, maximum 15 numbers',
        ];
    }
}
