<?php
namespace GdzieBusik\MyBusAPI\entities;

class Vehicle {
    public string $id; //id
    public int $vehicleNumber; // nb
    public string $routeShortName; //nr
    public string $variant; // wt
    public string $direction; // kr
    public int $tripId; // ik
    public int $currentStopIndex; // lp
    public int $distanceToEnd; //dp
    public int $distanceTravelled; // dw
    public float $lon; // x
    public float $lat; // y
    public float $nextStopLon; // px
    public float $nextStopLat; // py
    public int $delay; // o
    public int $status; // s
    public string $plannedTime; // p
    public string $currentStopName; // op
    public string $courseType; // c
    public int $nextStopId; // nk
    public string $nextStopIndex; // nnr
    public string $nextRouteVariant; // nwt
    public string $nextDirection; //nkr
    public string $nextStopName; // nop
    public string $integrationStatus; // is
    public string $vehicleType; // vt
    public string $blockId; // kwi

    public static function create(\SimpleXMLElement $element): Vehicle
    {
        $attrs = $element->attributes();
        $attrsArray = (array) $attrs;
        $attributes = $attrsArray['@attributes'];
        $vehicle = new Vehicle();
        $vehicle->setId($attributes['id']);
        $vehicle->setVehicleNumber($attributes['nb']);
        $vehicle->setRouteShortName($attributes['nr']);
        $vehicle->setVariant($attributes['wt']);
        $vehicle->setDirection($attributes['kr']);
        $vehicle->setTripId($attributes['ik']);
        $vehicle->setCurrentStopIndex($attributes['lp']);
        $vehicle->setDistanceToEnd($attributes['dp']);
        $vehicle->setDistanceTravelled($attributes['dw']);
        $vehicle->setLon($attributes['x']);
        $vehicle->setLat($attributes['y']);
        $vehicle->setNextStopLon($attributes['px']);
        $vehicle->setNextStopLat($attributes['py']);
        $vehicle->setDelay($attributes['o']);
        $vehicle->setStatus($attributes['s']);
        $vehicle->setPlannedTime($attributes['p']);
        $vehicle->setCurrentStopName($attributes['op']);
        $vehicle->setCourseType($attributes['c']);
        $vehicle->setNextStopId($attributes['nk']);
        $vehicle->setNextStopIndex($attributes['nnr']);
        $vehicle->setNextRouteVariant($attributes['nwt']);
        $vehicle->setNextDirection($attributes['nkr']);
        $vehicle->setNextStopName($attributes['nop']);
        $vehicle->setIntegrationStatus($attributes['is']);
        $vehicle->setVehicleType($attributes['vt']);
        $vehicle->setBlockId(trim($attributes['kwi']));
        return $vehicle;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getVehicleNumber(): int
    {
        return $this->vehicleNumber;
    }

    public function setVehicleNumber(int $vehicleNumber): void
    {
        $this->vehicleNumber = $vehicleNumber;
    }

    public function getRouteShortName(): string
    {
        return $this->routeShortName;
    }

    public function setRouteShortName(string $routeShortName): void
    {
        $this->routeShortName = $routeShortName;
    }

    public function getVariant(): string
    {
        return $this->variant;
    }

    public function setVariant(string $variant): void
    {
        $this->variant = $variant;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    public function getTripId(): int
    {
        return $this->tripId;
    }

    public function setTripId(int $tripId): void
    {
        $this->tripId = $tripId;
    }

    public function getCurrentStopIndex(): int
    {
        return $this->currentStopIndex;
    }

    public function setCurrentStopIndex(int $currentStopIndex): void
    {
        $this->currentStopIndex = $currentStopIndex;
    }

    public function getDistanceToEnd(): int
    {
        return $this->distanceToEnd;
    }

    public function setDistanceToEnd(int $distanceToEnd): void
    {
        $this->distanceToEnd = $distanceToEnd;
    }

    public function getDistanceTravelled(): int
    {
        return $this->distanceTravelled;
    }

    public function setDistanceTravelled(int $distanceTravelled): void
    {
        $this->distanceTravelled = $distanceTravelled;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function setLon(float $lon): void
    {
        $this->lon = $lon;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getNextStopLon(): float
    {
        return $this->nextStopLon;
    }

    public function setNextStopLon(float $nextStopLon): void
    {
        $this->nextStopLon = $nextStopLon;
    }

    public function getNextStopLat(): float
    {
        return $this->nextStopLat;
    }

    public function setNextStopLat(float $nextStopLat): void
    {
        $this->nextStopLat = $nextStopLat;
    }

    public function getDelay(): int
    {
        return $this->delay;
    }

    public function setDelay(int $delay): void
    {
        $this->delay = $delay;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getPlannedTime(): string
    {
        return $this->plannedTime;
    }

    public function setPlannedTime(string $plannedTime): void
    {
        $this->plannedTime = $plannedTime;
    }

    public function getCurrentStopName(): string
    {
        return $this->currentStopName;
    }

    public function setCurrentStopName(string $currentStopName): void
    {
        $this->currentStopName = $currentStopName;
    }

    public function getCourseType(): string
    {
        return $this->courseType;
    }

    public function setCourseType(string $courseType): void
    {
        $this->courseType = $courseType;
    }

    public function getNextStopId(): int
    {
        return $this->nextStopId;
    }

    public function setNextStopId(int $nextStopId): void
    {
        $this->nextStopId = $nextStopId;
    }

    public function getNextStopIndex(): string
    {
        return $this->nextStopIndex;
    }

    public function setNextStopIndex(string $nextStopIndex): void
    {
        $this->nextStopIndex = $nextStopIndex;
    }

    public function getNextRouteVariant(): string
    {
        return $this->nextRouteVariant;
    }

    public function setNextRouteVariant(string $nextRouteVariant): void
    {
        $this->nextRouteVariant = $nextRouteVariant;
    }

    public function getNextDirection(): string
    {
        return $this->nextDirection;
    }

    public function setNextDirection(string $nextDirection): void
    {
        $this->nextDirection = $nextDirection;
    }

    public function getNextStopName(): string
    {
        return $this->nextStopName;
    }

    public function setNextStopName(string $nextStopName): void
    {
        $this->nextStopName = $nextStopName;
    }

    public function getIntegrationStatus(): string
    {
        return $this->integrationStatus;
    }

    public function setIntegrationStatus(string $integrationStatus): void
    {
        $this->integrationStatus = $integrationStatus;
    }

    public function getVehicleType(): string
    {
        return $this->vehicleType;
    }

    public function setVehicleType(string $vehicleType): void
    {
        $this->vehicleType = $vehicleType;
    }

    public function getBlockId(): string
    {
        return $this->blockId;
    }

    public function setBlockId(string $blockId): void
    {
        $this->blockId = $blockId;
    }


}