<?php

interface VehicleInterface
{
    public function drivingForward(int $coordinate);

    public function drivingBackward(int $coordinate);

    public function personalAbility();

    public function showFuel();

    public function showSignal();

    public function wipers(string $action);

    public function interior();
}

abstract class Vehicle implements VehicleInterface
{
    protected $signal = 'bip-bip';

    protected $fuel = 'Diesel';

    public function drivingForward(int $coordinate)
    {
        echo "..going forward to x = " . ($coordinate + 1);
    }

    public function drivingBackward(int $coordinate)
    {
        echo "..going backward to x = " . ($coordinate - 1);
    }

    public function personalAbility()
    {
        echo "Ability: ";
        echo $this->ability;
    }

    public function showFuel()
    {
        echo "Fuel: ";
        echo $this->fuel;
    }

    public function showSignal()
    {
        echo "Signal: ";
        echo $this->signal;
    }

    public function wipers(string $action)
    {
        if ($action === "on") {
            echo "the wipers are working";
        } elseif ($action === "off") {
            echo "the wipers are not working";
        } else {
            echo "error of working with wipers";
        }
    }

    public function interior()
    {
        echo "Interior's color: ";
        echo $this->interiorColor; 
    }
}

class Motorcar extends Vehicle
{
    protected $fuel = 'Petrol';
    protected $ability = "do nitrous oxide";
    protected $interiorColor = "gray";
}

class Sportcar extends Vehicle
{
    protected $fuel = 'Petrol';
    protected $signal = 'wrum-wrum';
    protected $ability = "accelerate to 100 km/h";
    protected $interiorColor = "red";
}

class FireTruck extends Vehicle
{
    protected $signal = 'viu-viu';
    protected $ability = "put out a fire with a hose";
    protected $interiorColor = "brown";
}

class Tank extends Vehicle
{
    protected $ability = "drive off road and shoot";
    protected $interiorColor = "black";
}

class Tractor extends Vehicle
{
    protected $ability = "steer the bucket";
    protected $interiorColor = "dark blue";
}

class Truck extends Vehicle
{
    protected $ability = "carry a lot of load";
    protected $interiorColor = "dark green";
}

function selectedCar (string $vehicle="Motorcar", int $coordinate=0, string $wiper="on") {
    echo "Selected: {$vehicle}";
    echo "<br>";
    echo "Start coordinate: {$coordinate}";
    echo "<br>";
    $car = new $vehicle;
    echo $car->drivingForward($coordinate);
    echo "<br>";
    echo $car->drivingBackward($coordinate);
    echo "<br>";
    echo $car->personalAbility();
    echo "<br>";
    echo $car->showFuel();
    echo "<br>";
    echo $car->showSignal();
    echo "<br>";
    echo $car->wipers($wiper);
    echo "<br>";
    echo $car->interior();
}

selectedCar();

?>