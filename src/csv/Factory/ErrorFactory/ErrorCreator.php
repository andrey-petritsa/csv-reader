<?php

namespace Csv\Factory\ErrorFactory;

class ErrorCreator
{
    public function createError(string $errorMessage): Error
    {
        return new Error($errorMessage);
    }
}
