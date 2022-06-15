<?php

namespace App\Http\Controllers\Admin\Tasks;

use App\Http\Controllers\Controller;

use App\Http\Services\Admin\Tasks\CreateTaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateTaskController extends Controller
{
    public function handle(Request $request, Response $response): Response
    {
        $task = $request->get('task');
        $status = $request->get('status');

        try {
            $createTaskService = new CreateTaskService();
            $data = $createTaskService->execute($task, $status);

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
