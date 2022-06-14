<?php

namespace App\Validations;

use App\Exceptions\BadRequestException;

class AuthValidator
{
    const RULES = [
        'email' => 'required|email',
        'password' => 'required|min:6|max:255'
    ];

    const MESSAGES = [
        'email.required' => 'Campo e-mail obrigatório.',
        'email.email' => 'E-mail inválido.',
        'password.required' => 'Campo senha obrigatório.',
        'password.min' => 'A senha deve ser no mínimo 6 caracteres.',
        'password.max' => 'A senha deve ser no máximo 255 caracteres.'
    ];

    /**
     * @throws BadRequestException
     */
    public static function validate ($email, $password): void
    {
        $validator = validator([
            'email' => $email,
            'password' => $password
        ], self::RULES, self::MESSAGES);

        if ($validator->fails()) {
            throw new BadRequestException($validator->getMessageBag()->first(), $validator);
        }
    }
}
