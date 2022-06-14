<?php

namespace App\Validations;

use App\Exceptions\BadRequestException;

class UserValidator
{
    const CREATE_USER_RULES = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'password' => 'required|min:6|max:255'
    ];

    const CREATE_USER_MESSAGES = [
        'name.required' => 'Campo nome obrigatório.',
        'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
        'email.required' => 'Campo e-mail obrigatório.',
        'email.email' => 'E-mail inválido.',
        'password.required' => 'Campo senha obrigatório.',
        'password.min' => 'A senha deve ser no mínimo 6 caracteres.',
        'password.max' => 'A senha deve ser no máximo 255 caracteres.'
    ];


    const UPDATE_USER_RULES = [
        'name' => 'nullable|max:255',
        'email' => 'nullable|email',
        'password' => 'nullable|min:6|max:255'
    ];

    const UPDATE_USER_MESSAGES = [
        'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
        'email.email' => 'E-mail inválido.',
        'password.min' => 'A senha deve ser no mínimo 6 caracteres.',
        'password.max' => 'A senha deve ser no máximo 255 caracteres.'
    ];

    /**
     * @throws BadRequestException
     */
    public static function validateCreateUser (array $data): void
    {
        $validator = validator($data, self::CREATE_USER_RULES, self::CREATE_USER_MESSAGES);

        if ($validator->fails()) {
            throw new BadRequestException($validator->getMessageBag()->first(), $validator);
        }
    }

    /**
     * @throws BadRequestException
     */
    public static function validateUpdateUser (array $data): void
    {
        $validator = validator($data, self::UPDATE_USER_RULES, self::UPDATE_USER_MESSAGES);

        if ($validator->fails()) {
            throw new BadRequestException($validator->getMessageBag()->first(), $validator);
        }
    }
}
