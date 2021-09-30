<?php

namespace Csv\Employee;

class EmployeeHelper
{
    public function getUniqueEmployees(array $employees): array
    {
        return array_unique($employees, SORT_REGULAR);
    }
}
