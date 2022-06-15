<?php

namespace App\Http\Controllers\Admin\Tasks;

use App\Http\Controllers\Controller;

use App\Http\Services\Admin\Tasks\DeleteTaskService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteTaskController extends Controller
{
    public function handle(Request $request, Response $response, string $id): \Illuminate\Http\Response
    {
        try {
            $deleteTaskService = new DeleteTaskService();
            $data = $deleteTaskService->execute($id);

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
