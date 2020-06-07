<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\Common\StaticArray;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * Class UserService
 * @package App\Services\User
 */
class UserService
{
    /**
     * @param $email
     * @param array $exclude
     * @return Builder|Model|object|null
     */
    public static function check_exist($email, $exclude = [])
    {
        return User::where('email', 'ilike', '%' . $email . '%')->whereNotIn('id', $exclude)->first();
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function check_admin(User $user)
    {
        return $user->id !== null;
    }
}
