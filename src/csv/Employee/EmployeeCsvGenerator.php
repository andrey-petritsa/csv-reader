<?php

namespace Csv\Employee;

use Csv\CsvWriter;
use Csv\Fixture\FixtureGenerator;
use Csv\Fixture\FixtureSettings;

class EmployeeCsvGenerator
{
    private FixtureGenerator $fixtureGenerator;

    public function __construct($pathToFile)
    {
        $csvWriter = new CsvWriter($pathToFile);
        $settings = new FixtureSettings();

        $this->fixtureGenerator = new FixtureGenerator($settings, $csvWriter);
    }

    public function generateEmployeesCsv() {
        $this->fixtureGenerator->generateCsvWithEmployees();
    }
}
