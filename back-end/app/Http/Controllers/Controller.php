<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

use App\Exceptions\BadRequestException;
use App\Exceptions\ConflictException;
use App\Exceptions\ForbiddenException;
use App\Exceptions\NotFoundException;
use App\Exceptions\UnauthorizedException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ok($data = []): Response
    {
        return new Response($data);
    }

    public function error(\Exception $exception): Response
    {
        $errors = [];

        $message = match(true){
            $exception instanceof BadRequestException,
                $exception instanceof UnauthorizedException,
                $exception instanceof ConflictException,
                $exception instanceof ForbiddenException,
                $exception instanceof NotFoundException => $exception->getMessage(),
            default => 'Internal Server Error'
        };

        $errors['message'] = $message;

        if ($exception instanceof BadRequestException) {
            $errors['fields'] = $exception->fields;
        }

        return new Response($errors, $exception->statusCode ?? 500);
    }
}
