<?php
require_once '../vendor/autoload.php';

use Csv\Fixture\FixtureGenerator;

const OUTPUT_PATH = __DIR__ . '/./employee.csv';

$fixtureGenerator = new FixtureGenerator(OUTPUT_PATH);
$fixtureGenerator->generateCsv(OUTPUT_PATH);