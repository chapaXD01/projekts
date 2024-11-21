<?php
include_once "Aircraft.php";
include_once "Airport.php";
include_once "lidojums.php";

echo "<br><br>";

// Create an Aircraft object
$manaLidmasina = new Aircraft("Airbus", "A220-300", 120, 850);
var_dump($manaLidmasina);

echo "<br><br>";

// Create origin and destination Airport objects
$origin = new Airport("RIX", 56.924, 23.971); // Riga International Airport
$destination = new Airport("JFK", 40.6413, -73.7781); // John F. Kennedy International Airport
var_dump($origin);
var_dump($destination);

echo "<br><br>";

// Define departure time as a DateTime object
$departureTime = new DateTime("2024-11-21 10:00:00", new DateTimeZone("Europe/Riga"));

// Create a Flight object
$mansLidojums = new mansLidojums("SA503", $origin, $destination, $departureTime, $manaLidmasina);
var_dump($mansLidojums);

echo "<br><br>";
 
echo $mansLidojums->getDistance(). "km<br>";

echo $mansLidojums->getDuration(). "min<br>";

