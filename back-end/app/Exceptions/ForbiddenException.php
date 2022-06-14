<?php

namespace App\Exceptions;

use Exception;

class ForbiddenException extends Exception
{
    public $statusCode = 403;

    public function __construct($message = 'Forbidden')
    {
        parent::__construct($message);
    }
}
