<?php

namespace App\Http\Services\Admin;

use App\Exceptions\UnauthorizedException;
use App\Validations\AuthValidator;

use App\Exceptions\BadRequestException;
use JetBrains\PhpStorm\ArrayShape;

class AdminAuthService
{
    /**
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[ArrayShape(['user' => "\Illuminate\Contracts\Auth\Authenticatable|null", 'token' => "bool"])]
    public function execute(string $email, string $password): array
    {
        AuthValidator::validate($email, $password);

        $token = auth('admin')->attempt(['email' => $email, 'password' => $password]);

        if ($token) {
            return [
                'user' => auth('admin')->user(),
                'token' => $token
            ];
        }

        throw new UnauthorizedException('Usuario inexistente ou senha incorreta.');
    }
}
