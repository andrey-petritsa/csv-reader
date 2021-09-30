<?php

namespace Csv\Fixture;

use Csv\Factory\EmployeeFactory\Employee;

class FixtureGenerator
{
    private const PATH_TO_SETTINGS = __DIR__ . '/./fixture_settings.json';

    private string $outputCsvFilePath;
    private array $csvHeaders;

    private int $maxCountOfLines;
    private array $nameOptions;
    private int $minWorkHours;
    private int $maxWorkHours;

    public function __construct(string $outputCsvFilePath)
    {
        $this->outputCsvFilePath = $outputCsvFilePath;

        $json = file_get_contents(self::PATH_TO_SETTINGS);
        $settings = json_decode($json, true);

        $this->maxCountOfLines = $settings['maxCountOfLines'];

        $this->nameOptions = $settings['nameOptions'];
        $this->minWorkHours = $settings['workHoursOptions']['min'];
        $this->maxWorkHours = $settings['workHoursOptions']['max'];

        $this->csvHeaders = $settings['columnName'];
    }

    public function generateCsv()
    {
        if (file_exists($this->outputCsvFilePath)) {
            unlink($this->outputCsvFilePath);
        }

        $this->writeCsvHeaders();

        for ($i = 0; $i <= $this->maxCountOfLines; $i++) {
            $dummyEmployee = $this->getRandomEmployee();
            file_put_contents($this->outputCsvFilePath, (string)$dummyEmployee . PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    }

    private function writeCsvHeaders()
    {
        file_put_contents($this->outputCsvFilePath, implode(",", $this->csvHeaders) . PHP_EOL);
    }

    private function getRandomEmployee(): Employee
    {
        return new Employee($this->getRandomId(), $this->getRandomName(), $this->getRandomHours());
    }

    private function getRandomId(): int {
        return rand(1, $this->maxCountOfLines);
    }

    private function getRandomName(): string {
        return array_rand($this->nameOptions);
    }

    private function getRandomHours(): int {
        return rand($this->minWorkHours, $this->maxWorkHours);
    }
}
