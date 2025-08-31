<?php
namespace GdzieBusik\MyBusAPI;

class City {
    public function __construct(
        private string $name,
        private string $url,
        private string $code,
        private float $lat = 0.0,
        private float $lon = 0.0,
    ){}

    public function getAge(int $age): int {
        for ($i = 0; $i < strlen($this->code); $i++) {
            $age += ord($this->code[$i]);
        }
        return $age;
    }

    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }
}