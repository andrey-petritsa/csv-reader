<?php

use Csv\Employee\EmployeeCsvReader;

require_once '../vendor/autoload.php';

const PATH_TO_CSV = './employee.csv';

$employeeCsvReader = new EmployeeCsvReader(PATH_TO_CSV);

$employees = $employeeCsvReader->readUniqueEmployees();

foreach ($employees as $employee) {
    echo sprintf("Id: %d. Имя: %s. Часы: %d", $employee->getId(), $employee->getName(), $employee->getWorkedHours());
    echo PHP_EOL;
}
