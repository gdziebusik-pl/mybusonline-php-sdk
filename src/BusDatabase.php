<?php
namespace GdzieBusik\MyBusAPI;

use GdzieBusik\MyBusAPI\entities\Route;
use GdzieBusik\MyBusAPI\entities\Stop;
use GdzieBusik\MyBusAPI\entities\Trip;
use GdzieBusik\MyBusAPI\helpers\ScheduleHelper;
use PDO;
use PDOException;

class BusDatabase {
    private PDO $pdo;

    public function __construct(private readonly string $dbPath) {
        $this->connect();
    }

    private function connect(): void {
        try {
            $this->pdo = new PDO("sqlite:$this->dbPath");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Błąd połączenia: " . $e->getMessage();
        }
    }

    private function query(string $query): array|false {
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStops(): array {
        $items = $this->query("SELECT * FROM PRZYSTANKI");
        return array_map(fn ($stop) => Stop::create($stop), $items);
    }

    public function getRoutes(string $line = ""): array {
        $where = !empty($line) ? "WHERE trim(numer) = '$line'" : "";
        $routes = $this->query("SELECT * FROM KIERUNKI $where");
        return array_map(fn ($route) => Route::create($route), $routes);
    }

    public function getRoute(string $routeId): Route|null {
        $parts = explode("|", $routeId);
        $items = $this->query("SELECT * FROM KIERUNKI WHERE trim(numer) = '$parts[0]' AND war_trasy = '$parts[1]'");
        return empty($items) ? null : Route::create($items[0])->withTrips($this);
    }


    public function getTrips(string $line, string $variant): array {
        $stmt = $this->pdo->query("
            SELECT typ_dnia, numer_lini, k.war_trasy, odjazdy, opis_tabl, kierunek, trasa FROM ODJAZDY o
            JOIN KIERUNKI k ON TRIM(k.numer) = TRIM(o.numer_lini) AND k.war_trasy = o.war_trasy
            WHERE lp_przyst = 1 AND TRIM(numer) = '$line' AND k.war_trasy = '$variant'
            GROUP BY numer_lini, k.war_trasy, typ_dnia
            ORDER BY numer_lini ASC
        ");
        $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $items = [];
        foreach ($trips as $group) {
            $trips = ScheduleHelper::parse($group['odjazdy']);
            foreach ($trips as $trip) {
                $newItem = new Trip();
                $newItem->setId($trip['time']);
                $newItem->setDirectionId($group['kierunek']);
                $newItem->setRouteId($line.'|'.$variant);
                $newItem->setHeadsign($trip['marker'] ? $trip['marker'] : '');
                $newItem->setServiceId($group['typ_dnia']);
                $items[] = $newItem;
            }
        }
        return $items;
    }
}