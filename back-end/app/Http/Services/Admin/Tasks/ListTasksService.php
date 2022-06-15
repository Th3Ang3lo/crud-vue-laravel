<?php

namespace App\Http\Services\Admin\Tasks;

use App\Repositories\TasksRepository;

class ListTasksService
{
    public function execute(): array
    {
        $tasks = TasksRepository::find();

        return [
            'data' => $tasks
        ];
    }
}
