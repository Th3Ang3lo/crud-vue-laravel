<?php

namespace App\Http\Services\Admin\Users;

use App\Exceptions\NotFoundException;
use App\Repositories\UsersRepository;

class ListUsersService
{
    public function execute(): array
    {
        $users = UsersRepository::find();

        return [
            'data' => $users
        ];
    }
}
