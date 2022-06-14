<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Services\Admin\Users\CreateUserService;

class CreateUserController extends Controller
{
    public function handle(Request $request, Response $response): \Illuminate\Http\Response
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $createUserService = new CreateUserService();
            $data = $createUserService->execute([
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
