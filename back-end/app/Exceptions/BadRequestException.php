<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends Exception
{
    public int $statusCode = 400;
    public mixed $fields = [];

    public function __construct($message = 'Bad Request', $fields = [])
    {
        parent::__construct($message);

        $this->fields = $fields;
    }
}
