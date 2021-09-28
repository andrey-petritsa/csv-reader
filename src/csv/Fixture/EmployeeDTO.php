<?php

namespace Csv\Fixture;

class EmployeeDTO
{
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    private string $name;
    private int $workedHours;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getWorkedHours(): int
    {
        return $this->workedHours;
    }

    public function setWorkedHours(int $workedHours): void
    {
        $this->workedHours = $workedHours;
    }

    public function __toString(): string
    {
        return implode(',', [$this->id, $this->name, $this->workedHours]);
    }
}