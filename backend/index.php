<?php
   include_once "Aircraft.php";
   include_once "Airport.php";
   include_once "Lidojums.php";

echo "i am sigma😊  <br><br>";



   $manaLidmasina = new Aircraft("Airbus", "A220-300", 120, 850);
   var_dump($manaLidmasina);

echo "<br><br>";

   $mansAirport = new Airport("RIX", 56.924, 23.971);
   var_dump($mansAirport);

echo "<br><br>";
   
   $mansLidojums = new Lidojums("SA503", $origin, $destination, $departureTime, $aircraft);
   var_dump($mansLidojums);
