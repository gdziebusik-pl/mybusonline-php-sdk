<?php
namespace GdzieBusik\MyBusAPI\helpers;

class ScheduleHelper {
    public static function parse(string $input): array {
        $parts = array_map('trim', explode(',', $input));
        $out = [];

        for ($i = 0; $i < count($parts); $i += 2) {
            $timeRaw = $parts[$i] ?? '';
            $markerRaw = $parts[$i + 1] ?? null;

            if ($timeRaw === '' || !is_numeric($timeRaw)) continue;

            $time = (int)$timeRaw;
            $marker = ($markerRaw === '' || $markerRaw === null) ? null : $markerRaw;

            $out[] = [
                'time'   => $time,
                'marker' => $marker,
            ];
        }
        return $out;
    }
}