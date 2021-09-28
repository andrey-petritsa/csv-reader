<?php
require_once '../vendor/autoload.php';

use Csv\CsvReader;

$PATH_TO_CSV = './employee.csv';

foreach (CsvReader::readLine($PATH_TO_CSV) as $csvLine) {
    var_dump($csvLine);
}
