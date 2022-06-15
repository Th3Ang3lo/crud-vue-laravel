<?php

namespace App\Http\Services\Admin\Users;

use App\Exceptions\NotFoundException;
use App\Repositories\UsersRepository;

class GetUserService
{
    /**
     * @throws NotFoundException
     */
    public function execute(string $userId): array
    {
        $user = UsersRepository::findById($userId);
        if(!$user) throw new NotFoundException('Usuário inexistente.');

        return [
            'user' => $user
        ];
    }
}
