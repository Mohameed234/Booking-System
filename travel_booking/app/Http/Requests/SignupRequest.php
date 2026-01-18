<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|string|min:8|confirmed'
        ];
    }
}
