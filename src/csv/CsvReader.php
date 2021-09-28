<?php

namespace Csv;

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
}