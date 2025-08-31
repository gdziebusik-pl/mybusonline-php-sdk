<?php
namespace GdzieBusik\MyBusAPI\entities;

class Departure {
    public int $id; // i
    public int $di; // di
    public int $isGreen; // n
    public int $time; // t
    public string $line; // r
    public string $destination; // d
    public string $direction; // dd
    public string $type; // p
    public string $kn; // kn
    public int $vr; // vr
    public int $timeType; // m
    public string $departure; // v
    public string $features; // vn
    public int $iks; // iks
    public int $ip; // ip

    public static function create(\SimpleXMLElement $element): Departure {
        $attrs = $element->attributes();
        $attrsArray = (array) $attrs;
        $attributes = $attrsArray['@attributes'];
        $departure = new Departure();
        $departure->id = $attributes['i'];
        $departure->destination = $attributes['d'];
        $departure->direction = $attributes['dd'];
        $departure->features = $attributes['vn'];
        $departure->departure = $attributes['v'];
        $departure->line = $attributes['r'];
        $departure->time = $attributes['t'];
        $departure->isGreen = $attributes['n'];
        $departure->type = $attributes['p'];
        $departure->timeType = $attributes['m'];
        return $departure;
    }
}