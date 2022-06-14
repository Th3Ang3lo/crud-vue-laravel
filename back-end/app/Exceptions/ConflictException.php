<?php

namespace App\Exceptions;

use Exception;

class ConflictException extends Exception
{
    public $statusCode = 409;

    public function __construct($message = 'Conflict')
    {
        parent::__construct($message);
    }
}
