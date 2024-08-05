<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class PasswordService.
 */
class PasswordService
{
    public function checkUser($username, $full_name)
    {
        return User::where('username', $username)->where('full_name', $full_name)->exists();
    }

    public function changePassword($username, $new_password)
    {
        $user = User::where('username', $username)->first();

        if ($user && !Hash::check($new_password, $user->password)) {
            $user->password = Hash::make($new_password);
            $user->save();
            return true;
        }

        return false;
    }
}
