<?php

namespace App\Http\Services\Admin\Tasks;

use App\Exceptions\NotFoundException;

use App\Repositories\TasksRepository;

class DeleteTaskService
{
    /**
     * @throws NotFoundException
     */
    public function execute(string $taskId): array
    {
        $task = TasksRepository::findById($taskId);
        if(!$task) throw new NotFoundException('Tarefa inexistente.');

        TasksRepository::delete($taskId);

        return [];
    }
}
