<?php

namespace Csv\Fixture;

class FixtureGenerator
{
    const PATH_TO_SEETTINGS = __DIR__ . '/./fixture_settings.json';

    private string $outputCsvFilePath;
    private array $csvHeaders;

    private int $maxCountOfLines;
    private array $nameOptions;
    private int $minWorkHours;
    private int $maxWorkHours;

    public function __construct(string $outputCsvFilePath)
    {
        $this->outputCsvFilePath = $outputCsvFilePath;

        $json = file_get_contents(self::PATH_TO_SEETTINGS);
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

    private function getRandomEmployee()
    {
        $dummyEmployee = new EmployeeDTO();
        $dummyEmployee->setId(rand(1, $this->maxCountOfLines));
        $dummyEmployee->setName($this->nameOptions[array_rand($this->nameOptions)]);
        $dummyEmployee->setWorkedHours(rand($this->minWorkHours, $this->maxWorkHours));

        return $dummyEmployee;
    }

    private function writeCsvHeaders()
    {
        file_put_contents($this->outputCsvFilePath, implode(",", $this->csvHeaders) . PHP_EOL);
    }
}