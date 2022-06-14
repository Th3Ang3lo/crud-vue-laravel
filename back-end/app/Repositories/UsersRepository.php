<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    public static function findById(string $id)
    {
        return User::where('id', $id)->first();
    }

    public static function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public static function update(string $id, array $data)
    {
        return User::where('id', $id)->update($data);
    }
}
