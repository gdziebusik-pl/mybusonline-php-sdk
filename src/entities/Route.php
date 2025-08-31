<?php
namespace GdzieBusik\MyBusAPI\entities;

use GdzieBusik\MyBusAPI\BusDatabase;
use GdzieBusik\MyBusAPI\enums\VehicleType;
use PDO;

class Route {
    public string $id;
    public string $shortName;
    public string $longName;
    public string $desc;
    public VehicleType $type;
    public string $direction;

    public array $trips;


    public static function create(array $rs): Route {
        $route = new Route();
        $shortName = trim($rs['numer']);
        $route->setId($shortName.'|'.$rs['war_trasy']);
        $route->setShortName($shortName);
        $route->setLongName($rs['opis_tabl']);
        $route->setDesc($rs['opis2tabl']);
        $route->setType(VehicleType::fromCode($rs['transport']));
        $route->setDirection($rs['kierunek']);
        return $route;
    }

    public function withTrips(BusDatabase $db): Route {
        $parts = explode('|', $this->id);
        $this->trips = $db->getTrips($this->shortName, $parts[1]);
        return $this;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function setShortName(string $shortName): void
    {
        $this->shortName = $shortName;
    }

    public function getLongName(): string
    {
        return $this->longName;
    }

    public function setLongName(string $longName): void
    {
        $this->longName = $longName;
    }

    public function getDesc(): string
    {
        return $this->desc;
    }

    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }

    public function getType(): VehicleType
    {
        return $this->type;
    }

    public function setType(VehicleType $type): void
    {
        $this->type = $type;
    }


}