<?php
require_once '../vendor/autoload.php';

use Csv\Employee\EmployeeCsvGenerator;

const PATH_TO_FILE = __DIR__ . '/./employee.csv';

$employeeGenerator = new EmployeeCsvGenerator(PATH_TO_FILE);
$employeeGenerator->generateEmployeesCsv();
