<?php
namespace GdzieBusik\MyBusAPI;

use GdzieBusik\MyBusAPI\entities\Departure;
use GdzieBusik\MyBusAPI\entities\Vehicle;
use GuzzleHttp\Client;

class MyBusAPI extends XmlHelper {
    private Client $client;
    private int $age = 60;
    private ?BusDatabase $busDatabase = null;

    public function __construct(public City $city) {
        $this->client = new Client([
            'base_uri' => $this->city->getUrl(),
            'http_errors' => false,
            'headers' => [
                'User-Agent' => 'myBusOnline',
                "Age" => (string) $this->city->getAge($this->age),
                'Cache-Control'  => 'no-cache'
            ]
        ]);
        $this->updateAge();
    }

    public function updateAge(): void
    {
        $this->age = 60;
        $response = $this->client->get('PingService');
        $item = $this->load($response);
        $this->age = $this->intOrDefault($item);
    }

    public function getVehicles(string $buseShortName = "", ): array
    {
        $this->updateAge();
        $response = $this->client->get('GetVehicles', [
            'query' => [
                "cNbLst" => "",
                "cIdLst" => "",
                "cRouteLst" => $buseShortName,
                "cTrackLst" => "",
                "cDirLst" => "",
                "cKrsLst" => ""
            ]
        ]);
        $xml = $this->load($response);
        $items = [];
        foreach ($xml->V as $v) {
            $items[] = Vehicle::create($v);
        }
        return $items;
    }

    public function getRealStopTimetable(int $stopId) {
        $this->updateAge();
        $response = $this->client->get('GetTimeTableReal', [
            'query' => [
                'nBusStopId' => $stopId,
            ]
        ]);
        $xml = $this->load($response);
        $items = [];
        foreach ($xml->D as $v) {
            $items[] = Departure::create($v);
        }
        return $items;
    }

    private function getScheduleFile(): string {
        $this->updateAge();
        $response = $this->client->get('GetScheduleFile', [
            'stream' => true,
        ]);
        $content = $response->getBody()->getContents();

        $decoded = @gzdecode($content);
        if ($decoded === false) {
            throw new \RuntimeException("Failed to open GZIP.");
        }
        return $decoded;
    }

    public function getDatabase(): BusDatabase {
        if ($this->busDatabase != null) return $this->busDatabase;
        $data = $this->getScheduleFile();

        $tempFile = tempnam(sys_get_temp_dir(), 'gb_mybus_db_') . '.db';
        file_put_contents($tempFile, $data);

        register_shutdown_function(function () use ($tempFile) {
            @unlink($tempFile);
        });
        $this->busDatabase = new BusDatabase($tempFile);
        return $this->busDatabase;
    }
}