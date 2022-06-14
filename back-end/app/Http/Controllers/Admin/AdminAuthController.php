<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Services\Admin\AdminAuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminAuthController extends Controller
{
    public function handle(Request $request, Response $response): Response
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $adminAuthService = new AdminAuthService();
            $data = $adminAuthService->execute($email, $password);

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
