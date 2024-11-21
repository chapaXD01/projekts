<?php

class mansLidojums {
    public function __construct(
        public string $flightNumber,    // Flight number
        public Airport $origin,         // Origin airport
        public Airport $destination,    // Destination airport
        public DateTime $departureTime, // Departure time (DateTime object)
        public Aircraft $aircraft       // Aircraft
    ){}
    
      // Method to calculate distance between origin and destination
      public function getDistance(): float {
        $earthRadius = 6371; // Earth's radius in kilometers

        // Convert latitude and longitude from degrees to radians
        $latFrom = deg2rad($this->origin->platumaGradi);
        $lonFrom = deg2rad($this->origin->garumaGradi);
        $latTo = deg2rad($this->destination->platumaGradi);
        $lonTo = deg2rad($this->destination->garumaGradi);

        // Haversine formula
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $a = sin($latDelta / 2) ** 2 +
             cos($latFrom) * cos($latTo) * sin($lonDelta / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c; // Distance in kilometers
      }
      public function getDuration(): int {
        $distance = $this->getDistance();
        $speed = $this->aircraft->atrums; // Aircraft speed in km/h

        // Calculate flight time in hours and convert to minutes
        $flightTimeMinutes = ($distance / $speed) * 60;

        // Add 30 minutes for preparation time
        return (int)($flightTimeMinutes + 30);
    }
}