<?php

namespace Csv\Factory\EmployeeFactory;

class Employee
{
    public function __construct(private int $id, private string $name, private int $workedHours)
    {
    }

    public function __toString(): string
    {
        return implode(',', [$this->id, $this->name, $this->workedHours]);
    }
}
