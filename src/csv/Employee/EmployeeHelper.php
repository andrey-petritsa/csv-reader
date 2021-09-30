<?php

namespace Csv\Employee;

class EmployeeHelper
{
    public function getUniqueEmployees(array $employees): array
    {
        return array_unique($employees, SORT_REGULAR);
    }

    public function mergeErrorsToMessage(array $errors): string
    {
        $prettyMessage = '';

        foreach ($errors as $error) {
            $prettyMessage .= $error->getMessage() . PHP_EOL;
        }

        return $prettyMessage;
    }
}
