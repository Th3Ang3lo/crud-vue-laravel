<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Services\Admin\Users\ListUsersService;

class ListUsersController extends Controller
{
    public function handle(Request $request, Response $response): \Illuminate\Http\Response
    {
        try {
            $listUsersController = new ListUsersService();
            $data = $listUsersController->execute();

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
