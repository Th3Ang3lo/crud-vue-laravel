<?php

namespace App\Http\Controllers\Admin\Tasks;

use App\Http\Controllers\Controller;

use App\Http\Services\Admin\Tasks\UpdateTaskService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpdateTaskController extends Controller
{
    public function handle(Request $request, Response $response, $id): Response
    {
        $task = $request->get('task');
        $status = $request->get('status');

        try {
            $updateTaskService = new UpdateTaskService();
            $data = $updateTaskService->execute($id, $task, $status);

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
