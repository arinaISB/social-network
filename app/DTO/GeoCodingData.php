<?php

namespace App\DTO;

class GeoCodingData
{
    private string $lat;
    private string $lon;

    public function getLat(): string
    {
        return $this->lat;
    }
    public function getLon(): string
    {
        return $this->lon;
    }

    private function __construct(string $lat, string $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public static function create(string $lat, string $lon): GeoCodingData
    {
        return new self($lat, $lon);
    }
}
