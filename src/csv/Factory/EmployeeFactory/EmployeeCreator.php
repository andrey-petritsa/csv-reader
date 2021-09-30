<?php

namespace Csv\Factory\EmployeeFactory;

use Csv\Employee\Validation\EmployeeValidator;
use http\Exception\InvalidArgumentException;

class EmployeeCreator
{

    public function __construct(private EmployeeValidator $employeeValidator)
    {
    }

    public function createEmployee($employeeRow): Employee
    {
        return new Employee($employeeRow[0], $employeeRow[1], $employeeRow[2]);
    }

    public function getEmployeeFromRow(array $employeeRow): Employee
    {
        $errors = $this->employeeValidator->validate($employeeRow);

        if (!empty($errors)) {
            throw new InvalidArgumentException($this->employeeValidator->mergeErrorsToMessage($errors));
        }

        return $this->createEmployee($employeeRow);
    }
}
