<?php

namespace Csv;

use Csv\Fixture\EmployeeDTO;

class CsvReader
{
    public static function readLine(string $pathToFile): \Generator
    {
        $csvFile = fopen($pathToFile, 'r');
        if (!$csvFile) {
            throw new \Exception("Файл $pathToFile не найден. У файла есть права на чтение?");
        }

        while ($line = fgets($csvFile)) {
            yield $line;
        }
    }

    public static function parseCsvLineToEmployee(string $csvRow)
    {
        $csvRow = str_replace("\n", '', $csvRow);
        $parsedEmployee = explode(',', $csvRow);

        $dummyEmployee = new EmployeeDTO();
        $dummyEmployee->setId($parsedEmployee[0]);
        $dummyEmployee->setName($parsedEmployee[1]);
        $dummyEmployee->setWorkedHours($parsedEmployee[2]);

        return $dummyEmployee;
    }
}