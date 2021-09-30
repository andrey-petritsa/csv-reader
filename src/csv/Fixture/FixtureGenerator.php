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

        for ($i = 0; $i <= $this->settings->getMaxCountOfLines(); $i++) {
            $employee = $this->getRandomEmployee();
            $this->csvWriter->writeContentRow(array($employee));
        }
    }

    private function writeHeaders()
    {
        $this->csvWriter->writeContentRow($this->settings->getHeaders());
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
        return array_rand($this->settings->getNameOptions());
    }

    private function getRandomHours(): int
    {
        return rand($this->settings->getHoursOptions()['min'], $this->settings->getHoursOptions()['max']);
    }
}
