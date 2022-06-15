<?php

namespace App\Http\Controllers\Admin\Tasks;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Services\Admin\Tasks\ListTasksService;

class ListTasksController extends Controller
{
    public function handle(Request $request, Response $response): \Illuminate\Http\Response
    {
        try {
            $listTasksController = new ListTasksService();
            $data = $listTasksController->execute();

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
