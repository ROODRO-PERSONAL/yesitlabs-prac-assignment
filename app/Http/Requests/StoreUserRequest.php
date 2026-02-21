<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'mobile' => ['required', 'digits:10'],
            'profile_pic' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'password' => ['required', 'min:6']
        ];
    }
}
