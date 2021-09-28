<?php

namespace Csv\Fixture;

class FixtureGenerator
{
    const PATH_TO_SEETTINGS = './fixture_settings.json';

    private int $maxCountOfLines;
    private array $nameOptions;
    private int $minWorkHours;
    private int $maxWorkHours;

    private string $outputPath;


    public function __construct()
    {
        $json = file_get_contents(self::PATH_TO_SEETTINGS);
        $settings = json_decode($json, true);

        $this->maxCountOfLines = $settings['maxCountOfLines'];
        $this->nameOptions = $settings['nameOptions'];
        $this->minWorkHours = $settings['workHoursOptions']['min'];
        $this->maxWorkHours = $settings['workHoursOptions']['max'];

        $this->outputPath = $settings['outputPath'];
    }

    public function generateCsv()
    {
        for ($i = 0; $i < $this->maxCountOfLines; $i++) {
            $dummyEmployee = $this->getRandomEmployee();
            file_put_contents($this->outputPath, (string)$dummyEmployee, FILE_APPEND | LOCK_EX);
        }
    }

    private function getRandomEmployee()
    {
        $dummyEmployee = new EmployeeDTO();
        $dummyEmployee->setId(rand(1, $this->maxCountOfLines));
        $dummyEmployee->setName(array_rand($this->nameOptions));
        $dummyEmployee->setWorkedHours(rand($this->minWorkHours, $this->maxWorkHours));

        return $dummyEmployee;
    }


}