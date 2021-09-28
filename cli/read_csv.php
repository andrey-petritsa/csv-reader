<?php
require_once '../vendor/autoload.php';

use Csv\CsvReader;

$PATH_TO_CSV = './employee.csv';

$isReadingCsvHeaders = true;
$employees = [];
foreach (CsvReader::readLine($PATH_TO_CSV) as $csvLine) {
    if ($isReadingCsvHeaders) {
        $isReadingCsvHeaders = false;
        continue;
    }

    $employees[] = CsvReader::parseCsvLineToEmployee($csvLine);
}

$employees = array_unique($employees, SORT_REGULAR);

foreach ($employees as $employee) {
    echo "Employee id: {$employee->getId()} Employee name: {$employee->getName()}, Employee hours: {$employee->getWorkedHours()}";
    echo PHP_EOL;
}
