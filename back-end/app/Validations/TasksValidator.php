<?php

namespace App\Validations;

use App\Exceptions\BadRequestException;

class TasksValidator
{
    const RULES = [
        'task' => 'required|max:255',
        'status' => 'required|in:pending,started,done'
    ];

    const MESSAGES = [
        'task.required' => 'Campo tarefa obrigatório.',
        'task.max' => 'A tarefa deve ter no máximo 255 caracteres.',
        'status.required' => 'Status da tarefa obrigatório.',
        'status.in' => 'Status da tarefa inválido.'
    ];

    /**
     * @throws BadRequestException
     */
    public static function validate ($task, $status): void
    {
        $validator = validator([
            'task' => $task,
            'status' => $status
        ], self::RULES, self::MESSAGES);

        if ($validator->fails()) {
            throw new BadRequestException($validator->getMessageBag()->first(), $validator);
        }
    }
}
