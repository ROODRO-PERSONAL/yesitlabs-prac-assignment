<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($data)
    {
        // upload image
        if (isset($data['profile_pic'])) {
            $imagePath = $data['profile_pic']
                ->store('profiles', 'public');

            $data['profile_pic'] = $imagePath;
        }

        // hash password
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
}