<?php
namespace GdzieBusik\MyBusAPI\entities;

class Trip {
    public int $id;
    public string $routeId;
    public string $serviceId;
    public string $headsign;
    public string $shortName;
    public string $directionId;
    public string $blockId;
    public string $shapeId;

    public static function create(array $rs): Trip {
        $trip = new Trip();
//        $trip->setId($rs['id']);
        $trip->setRouteId($rs['numer_lini'].'|'.$rs['war_trasy']);
        $trip->setServiceId($rs['typ_dnia']);
        $trip->setHeadsign($rs['opis_tabl']);
        $trip->setDirectionId($rs['kierunek']);
        return $trip;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRouteId(): string
    {
        return $this->routeId;
    }

    public function setRouteId(string $routeId): void
    {
        $this->routeId = $routeId;
    }

    public function getServiceId(): string
    {
        return $this->serviceId;
    }

    public function setServiceId(string $serviceId): void
    {
        $this->serviceId = $serviceId;
    }

    public function getHeadsign(): string
    {
        return $this->headsign;
    }

    public function setHeadsign(string $headsign): void
    {
        $this->headsign = $headsign;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function setShortName(string $shortName): void
    {
        $this->shortName = $shortName;
    }

    public function getDirectionId(): string
    {
        return $this->directionId;
    }

    public function setDirectionId(string $directionId): void
    {
        $this->directionId = $directionId;
    }

    public function getBlockId(): string
    {
        return $this->blockId;
    }

    public function setBlockId(string $blockId): void
    {
        $this->blockId = $blockId;
    }

    public function getShapeId(): string
    {
        return $this->shapeId;
    }

    public function setShapeId(string $shapeId): void
    {
        $this->shapeId = $shapeId;
    }


}