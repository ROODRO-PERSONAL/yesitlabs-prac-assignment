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
            'mobile' => ['required', 'digits:10', 'unique:users,mobile'],
            'profile_pic' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'password' => ['required', 'min:6']
        ];
    }

    // CUSTOM ERROR MESSAGES (ADD HERE)
    // public function messages(): array
    // {
    //     return [
    //         'mobile.unique' => 'This mobile number already exists.',
    //         // 'mobile.digits' => 'Mobile must be exactly 10 digits.',
    //         // 'name.regex' => 'Name must contain only letters.',
    //     ];
    // }
}
