<?php

namespace App\Infrastructure\Persistence;

use Exception;

class DatabaseException extends Exception
{

    public function __construct(String $message)
    {
        parent::__construct("$message");
    }
}
