<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user');

        return [
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', "unique:users,email,$userId"],
            'mobile' => ['required', 'digits:10', "unique:users,mobile,$userId"],
            'profile_pic' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'password' => ['nullable', 'min:6']
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'mobile.unique' => 'This mobile number already exists.',
    //         'mobile.digits' => 'Mobile must be exactly 10 digits.',
    //     ];
    // }
}
