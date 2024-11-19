<?php

class Lidojums {
    private string $flightCode;
    private string $origin;
    private string $destination;
    private DateTime $departureTime;
    private string $aircraft;

    /**
     * Flight constructor.
     *
     * @param string $flightCode Lidojuma kods
     * @param string $origin Izlidošanas lidosta
     * @param string $destination Galamērķa lidosta
     * @param DateTime $departureTime Izlidošanas datums un laiks
     * @param string $aircraft Lidmašīna
     */
    public function __construct(
        string $flightCode,
        string $origin,
        string $destination,
        DateTime $departureTime,
        string $aircraft
    ) {
        $this->flightCode = $flightCode;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->departureTime = $departureTime;
        $this->aircraft = $aircraft;

        $this->validate();
    }

    /**
     * Validē lidojuma datus.
     *
     * @throws Exception Ja dati nav derīgi
     */
    private function validate(): void {
        if (empty($this->flightCode)) {
            throw new Exception("Lidojuma kods nevar būt tukšs.");
        }

        if (empty($this->origin) || empty($this->destination)) {
            throw new Exception("Izlidošanas vai galamērķa lidosta nevar būt tukša.");
        }

        if ($this->origin === $this->destination) {
            throw new Exception("Izlidošanas lidosta nevar sakrist ar galamērķa lidostu.");
        }

        $now = new DateTime();
        if ($this->departureTime < $now) {
            throw new Exception("Izlidošanas laiks nevar būt pagātnē.");
        }

        if (empty($this->aircraft)) {
            throw new Exception("Lidmašīna nevar būt tukša.");
        }
    }

    // Getteri un, ja nepieciešams, setteri
    public function getFlightCode(): string {
        return $this->flightCode;
    }

    public function getOrigin(): string {
        return $this->origin;
    }

    public function getDestination(): string {
        return $this->destination;
    }

    public function getDepartureTime(): DateTime {
        return $this->departureTime;
    }

    public function getAircraft(): string {
        return $this->aircraft;
    }
}

// Piemēra lietojums
try {
    $origin = "RIX"; // Rīgas lidosta
    $destination = "LHR"; // Londonas lidosta
    $departureTime = new DateTime("2024-12-01 15:30", new DateTimeZone("Europe/Riga"));
    $aircraft = "Airbus A320";

    $flight = new Lidojums("SA503", $origin, $destination, $departureTime, $aircraft);

    echo "Lidojums veiksmīgi izveidots: " . $flight->getFlightCode();
} catch (Exception $e) {
    echo "Kļūda: " . $e->getMessage();
}