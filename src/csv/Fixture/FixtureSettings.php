<?php

namespace Csv\Fixture;

class FixtureSettings
{
    private const PATH_TO_SETTINGS = __DIR__ . '/./fixture_settings.json';

    private int $maxCountOfLines;
    private array $nameOptions;
    private array $hoursOptions;
    private array $headers;

    public function __construct()
    {
        $settings = $this->parseSettingsFromJson();

        $this->maxCountOfLines = $settings['maxCountOfLines'];
        $this->nameOptions = $settings['nameOptions'];
        $this->hoursOptions = $settings['workHoursOptions'];
        $this->headers = $settings['headers'];
    }

    private function parseSettingsFromJson(): array
    {
        $json = file_get_contents(self::PATH_TO_SETTINGS);

        return json_decode($json, true);
    }

    public function getMaxCountOfLines(): int
    {
        return $this->maxCountOfLines;
    }

    public function getNameOptions(): array
    {
        return $this->nameOptions;
    }

    public function getHoursOptions(): array
    {
        return $this->hoursOptions;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}
