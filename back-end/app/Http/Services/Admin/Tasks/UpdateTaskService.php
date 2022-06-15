<?php

namespace App\Http\Services\Admin\Tasks;

use App\Exceptions\BadRequestException;

use App\Exceptions\NotFoundException;
use App\Repositories\TasksRepository;
use App\Validations\TasksValidator;
use Carbon\Carbon;

class UpdateTaskService
{
    /**
     * @throws BadRequestException
     * @throws NotFoundException
     */
    public function execute(string $id, string $task, string $status): array
    {
        TasksValidator::validate($task, $status);

        $findTask = TasksRepository::findById($id);
        if(!$findTask) throw new NotFoundException('Tarefa não encontrada.');

        $data = [
            'task' => $task ?? $findTask->task,
            'status' => $status ?? $findTask->status,
            'conclused_at' => $status === 'done' ? Carbon::now() : null
        ];

        TasksRepository::update($id, $data);

        return [];
    }
}
