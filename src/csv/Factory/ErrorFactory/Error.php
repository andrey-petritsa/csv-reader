<?php

namespace Csv\Factory\ErrorFactory;

class Error
{
    public function __construct(private string $message)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
