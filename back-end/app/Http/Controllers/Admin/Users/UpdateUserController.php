<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Services\Admin\Users\UpdateUserService;

class UpdateUserController extends Controller
{
    public function handle(Request $request, Response $response, string $id): \Illuminate\Http\Response
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $updateUserService = new UpdateUserService();
            $data = $updateUserService->execute($id, [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
