<?php

namespace App\Http\Services\Admin\Users;

use App\Exceptions\ConflictException;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Validations\UserValidator;

use App\Exceptions\BadRequestException;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;

class CreateUserService
{
    /**
     * @throws BadRequestException
     * @throws ConflictException
     */
    #[ArrayShape(['id' => "mixed", 'name' => "mixed", 'email' => "mixed"])]
    public function execute(array $data): array
    {
        UserValidator::validateCreateUser($data);

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $findUserByEmail = UsersRepository::findByEmail($email);
        if($findUserByEmail) throw new ConflictException('E-mail indisponível');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return [
            'id' => $user->id,
            'name' => $name,
            'email' => $email
        ];
    }
}
