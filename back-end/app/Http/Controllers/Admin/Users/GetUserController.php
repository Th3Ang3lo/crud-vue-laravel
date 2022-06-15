<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use App\Http\Services\Admin\Users\GetUserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetUserController extends Controller
{
    public function handle(Request $request, Response $response, string $id): \Illuminate\Http\Response
    {
        try {
            $getUserService = new GetUserService();
            $data = $getUserService->execute($id);

            return $this->ok($data);
        } catch (\Exception $exception) {
            return $this->error($exception);
        }
    }
}
