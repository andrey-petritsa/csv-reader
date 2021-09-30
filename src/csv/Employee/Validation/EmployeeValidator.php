<?php

namespace Csv\Employee\Validation;

use Csv\Factory\ErrorFactory\ErrorCreator;

class EmployeeValidator
{
    const haveToBeNotBlankKeys = [0, 1, 2];

    public function __construct(private ErrorCreator $errorCreator)
    {
    }

    public function validate(array $employeeRow): array
    {
        $errors = [];

        foreach (self::haveToBeNotBlankKeys as $haveToBeNotBlankKey) {

            if ($this->isBlank($employeeRow[$haveToBeNotBlankKey])) {
                $errors[] = $this->errorCreator->createError("Значение с индексом $haveToBeNotBlankKey не может быть пустым");
            }

        }

        return $errors;
    }

    private function isBlank($value): bool
    {
        if (empty($value)) {
            return true;
        }

        return false;
    }
}
