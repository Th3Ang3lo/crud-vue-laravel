<?php

namespace App\Http\Services\Admin\Users;

use App\Exceptions\ConflictException;
use App\Exceptions\NotFoundException;
use App\Repositories\UsersRepository;
use App\Validations\UserValidator;

use App\Exceptions\BadRequestException;
use Illuminate\Support\Facades\Hash;

class UpdateUserService
{
    /**
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws ConflictException
     */
    public function execute(string $userId, array $data): array
    {
        UserValidator::validateUpdateUser($data);

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $user = UsersRepository::findById($userId);
        if(!$user) throw new NotFoundException('Usuário inexistente.');

        if ($email) {
            $findUserByEmail = UsersRepository::findByEmail($email);

            if($findUserByEmail) {
                if ($findUserByEmail->id != $userId) {
                    throw new ConflictException('E-mail indisponível');
                }
            }
        }

        UsersRepository::update($userId, [
            'name' => $name ?? $user->name,
            'email' => $email ?? $user->email,
            'password' => $password ? Hash::make($password) : $user->password
        ]);

        return [];
    }
}
