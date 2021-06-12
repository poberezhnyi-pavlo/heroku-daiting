<?php

namespace App\Exceptions;

use Throwable;

final class CanPayException extends CustomException
{
    public function __construct(
        string $message = 'You do not have enough money to use this service',
        $code = 422,
        Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
