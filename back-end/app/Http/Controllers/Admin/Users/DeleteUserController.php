<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use App\Http\Services\Admin\Users\DeleteUserService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteUserController extends Controller
{
    public function handle(Request $request, Response $response, string $id): \Illuminate\Http\Response
    {
        try {
            $deleteUserService = new DeleteUserService();
            $data = $deleteUserService->execute($id);

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
