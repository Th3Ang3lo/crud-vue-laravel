<?php

namespace App\Http\Services\Admin\Users;

use App\Exceptions\NotFoundException;
use App\Repositories\UsersRepository;

class DeleteUserService
{
    /**
     * @throws NotFoundException
     */
    public function execute(string $userId): array
    {
        $user = UsersRepository::findById($userId);
        if(!$user) throw new NotFoundException('Usuário inexistente.');

        UsersRepository::delete($userId);

        return [];
    }
}
