<?php
require_once '../vendor/autoload.php';

use Csv\CsvReader;

$PATH_TO_CSV = './employee.csv';

$isReadingCsvHeaders = true;
foreach (CsvReader::readLine($PATH_TO_CSV) as $csvLine) {
    if ($isReadingCsvHeaders) {
        $isReadingCsvHeaders = false;
        continue;
    }

    $employee = CsvReader::parseCsvLineToEmployee($csvLine);
    echo "Employee id: {$employee->getId()} Employee name: {$employee->getName()}, Employee hours: {$employee->getWorkedHours()}";
    echo PHP_EOL;
}
