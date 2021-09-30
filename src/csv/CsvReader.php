<?php

namespace Csv;

use Generator;
use InvalidArgumentException;

class CsvReader
{
    private $csvFile;

    public function __construct(private string $pathToCsv)
    {
        $this->csvFile = fopen($this->pathToCsv, 'r');
        if (!$this->csvFile) {
            throw new InvalidArgumentException("Файл $this->pathToCsv не найден. У файла есть права на чтение?");
        }
    }

    public function readContentRow(): Generator
    {
        $this->skipHeaders();
        while ($line = fgetcsv($this->csvFile)) {
            yield $line;
        }
    }

    private function skipHeaders()
    {
        fgetcsv($this->csvFile);
    }
}
