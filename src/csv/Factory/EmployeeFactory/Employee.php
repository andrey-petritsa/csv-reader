<?php

namespace Csv\Factory\EmployeeFactory;

class Employee
{
    public function __construct(private int $id, private string $name, private int $workedHours)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWorkedHours(): int
    {
        return $this->workedHours;
    }

    public function __toString(): string
    {
        return implode(',', [$this->id, $this->name, $this->workedHours]);
    }
}
