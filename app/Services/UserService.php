<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    // update user details
    public function update($user, $data)
    {
        // replace image if uploaded
        if (isset($data['profile_pic'])) {

            // delete old image
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $data['profile_pic'] =
                $data['profile_pic']->store('profiles', 'public');
        }

        // update password only if provided
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $user;
    }


    public function delete($user)
    {
        if ($user->profile_pic) {
            Storage::disk('public')->delete($user->profile_pic); // delete profile image
        }

        return $user->delete();
    }
}
