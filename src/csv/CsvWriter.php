<?php

namespace Csv;

use http\Exception\InvalidArgumentException;

class CsvWriter
{
    public function __construct(private string $pathToFile)
    {
        $this->csvFile = fopen($this->pathToFile, 'w');

        if (!$this->csvFile) {
            throw new InvalidArgumentException("Не удалось открыть для записи файл $pathToFile");
        }
    }

    public function writeContentRow(array $row): bool {
        return fputcsv($this->csvFile, $row);
    }
}
