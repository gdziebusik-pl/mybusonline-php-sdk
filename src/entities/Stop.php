<?php
namespace GdzieBusik\MyBusAPI\entities;

class Stop {
    public int $id;
    public string $name;
    public string $number;
    public string $departures;
    public float $lat;
    public float $lon;
    public string $transport;
    public string $lines;
    public int $sort;
    public string $direction;


    public static function create(array $rs): Stop {
        $stop = new Stop();
        $stop->setId($rs["id"]);
        $stop->setName($rs["nazwa"]);
        $stop->setNumber($rs["numer"]);
        $stop->setDepartures($rs["odjazdy"]);
        $stop->setLat($rs["lat"]);
        $stop->setLon($rs["lon"]);
        $stop->setTransport($rs["transport"]);

        return $stop;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getDepartures(): string
    {
        return $this->departures;
    }

    public function setDepartures(string $departures): void
    {
        $this->departures = $departures;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function setLon(float $lon): void
    {
        $this->lon = $lon;
    }

    public function getTransport(): string
    {
        return $this->transport;
    }

    public function setTransport(string $transport): void
    {
        $this->transport = $transport;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function setSort(int $sort): void
    {
        $this->sort = $sort;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    public function getLines(): string
    {
        return $this->lines;
    }

    public function setLines(string $lines): void
    {
        $this->lines = $lines;
    }
}