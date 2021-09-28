<?php

use Csv\CsvReader;

require_once 'vendor/autoload.php';

$PATH_TO_CSV = './employee.csv';

foreach (CsvReader::readLine($PATH_TO_CSV) as $csvLine) {
    var_dump($csvLine);
}
