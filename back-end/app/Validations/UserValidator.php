<?php

namespace App\Validations;

use App\Exceptions\BadRequestException;

class UserValidator
{
    const RULES = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'password' => 'required|min:6|max:255'
    ];

    const MESSAGES = [
        'name.required' => 'Campo nome obrigatório.',
        'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
        'email.required' => 'Campo e-mail obrigatório.',
        'email.email' => 'E-mail inválido.',
        'password.required' => 'Campo senha obrigatório.',
        'password.min' => 'A senha deve ser no mínimo 6 caracteres.',
        'password.max' => 'A senha deve ser no máximo 255 caracteres.'
    ];

    /**
     * @throws BadRequestException
     */
    public static function validateCreateUser (array $data): void
    {
        $validator = validator($data, self::RULES, self::MESSAGES);

        if ($validator->fails()) {
            throw new BadRequestException($validator->getMessageBag()->first(), $validator);
        }
    }
}
