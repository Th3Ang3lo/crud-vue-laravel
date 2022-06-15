<?php

namespace App\Http\Services\Admin\Tasks;

use App\Exceptions\BadRequestException;

use App\Repositories\TasksRepository;
use App\Validations\TasksValidator;

class CreateTaskService
{
    /**
     * @throws BadRequestException
     */
    public function execute(string $task, string $status): array
    {
        TasksValidator::validate($task, $status);

        $data = [
            'task' => $task,
            'status' => $status
        ];

        $task = TasksRepository::create($data);

        return [
            'task' => $task
        ];
    }
}
