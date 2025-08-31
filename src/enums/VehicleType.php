<?php
namespace GdzieBusik\MyBusAPI\enums;

use JsonSerializable;

enum VehicleType: string implements JsonSerializable {
    case BUS = 'A';
    case TROLLEYBUS = 'R';
    case TRAM = 'T';

    public static function fromCode(string $code): self {
        return self::from($code);
    }

    public function jsonSerialize(): string {
        return $this->name;
    }
}
