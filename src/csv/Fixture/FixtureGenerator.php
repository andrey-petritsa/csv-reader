<?php

namespace Csv\Fixture;

use Csv\CsvWriter;
use Csv\Factory\EmployeeFactory\Employee;

class FixtureGenerator
{

    public function __construct(private FixtureSettings $settings, private CsvWriter $csvWriter)
    {
    }

    public function generateCsvWithEmployees(): void
    {
        $this->writeHeaders();

        for ($i = 0; $i <= $this->getCountOfEmployees(); $i++) {
            $employee = $this->getRandomEmployee();
            $this->csvWriter->writeContentRow((array)$employee);
        }

    }

    private function writeHeaders()
    {
        $this->csvWriter->writeContentRow($this->settings->getHeaders());
    }

    private function getCountOfEmployees(): int
    {
        return $this->settings->getMaxCountOfLines();
    }

    private function getRandomEmployee(): Employee
    {
        return new Employee($this->getRandomId(), $this->getRandomName(), $this->getRandomHours());
    }

    private function getRandomId(): int
    {
        return rand(1, $this->settings->getMaxCountOfLines());
    }

    private function getRandomName(): string
    {
        $nameOptions = $this->settings->getNameOptions();
        return $nameOptions[array_rand($nameOptions)];
    }

    private function getRandomHours(): int
    {
        return rand($this->settings->getHoursOptions()['min'], $this->settings->getHoursOptions()['max']);
    }
}
