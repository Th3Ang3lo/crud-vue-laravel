<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public $statusCode = 404;

    public function __construct($message = 'Not Found')
    {
        parent::__construct($message);
    }
}
