<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    public $statusCode = 401;

    public function __construct($message = 'Unauthorized')
    {
        parent::__construct($message);
    }
}
