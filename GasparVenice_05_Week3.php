<?php

// Base class for all vehicles
class Vehicle {
    private string $make;
    private string $model;
    private int $year;

    public function __construct(string $make, string $model, int $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to prevent overriding
    final public function getDetails(): string {
        return "Make: {$this->make}, Model: {$this->model}, Year: {$this->year}";
    }

    public function displayInfo(): string {
        return $this->getDetails();
    }

    // Method to be overridden
    public function describe(): string {
        return "This is a vehicle.";
    }
}

// Car class extending Vehicle
class Car extends Vehicle {
    private int $numberOfDoors;

    public function __construct(string $make, string $model, int $year, int $numberOfDoors) {
        parent::__construct($make, $model, $year);
        $this->numberOfDoors = $numberOfDoors;
    }

    public function describe(): string {
        return "This is a car with {$this->numberOfDoors} doors.";
    }

    public function getNumberOfDoors(): int {
        return $this->numberOfDoors;
    }
}

// Final Motorcycle class extending Vehicle
final class Motorcycle extends Vehicle {
    private string $type;

    public function __construct(string $make, string $model, int $year, string $type) {
        parent::__construct($make, $model, $year);
        $this->type = $type;
    }

    public function describe(): string {
        return "This is a motorcycle of type: {$this->type}.";
    }
}

// ElectricVehicle interface
interface ElectricVehicle {
    public function chargeBattery(): string;
}

// ElectricCar class extending Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private int $batteryLevel;

    public function __construct(string $make, string $model, int $year, int $numberOfDoors, int $batteryLevel) {
        parent::__construct($make, $model, $year, $numberOfDoors);
        $this->batteryLevel = $batteryLevel;
    }

    public function chargeBattery(): string {
        $this->batteryLevel = 100; // Assuming a full charge
        return "Battery charged to 100%.";
    }

    public function describe(): string {
        return "This is an electric car with {$this->getNumberOfDoors()} doors.";
    }
}

// Testing the implementation
$car = new Car("Toyota", "Corolla", 2022, 4);
$motorcycle = new Motorcycle("Harley-Davidson", "Street 750", 2021, "Cruiser");
$electricCar = new ElectricCar("Tesla", "Model S", 2023, 4, 80);

echo $car->displayInfo() . PHP_EOL; // Display car details
echo $car->describe() . PHP_EOL; // Describe car

echo $motorcycle->displayInfo() . PHP_EOL; // Display motorcycle details
echo $motorcycle->describe() . PHP_EOL; // Describe motorcycle

echo $electricCar->displayInfo() . PHP_EOL; // Display electric car details
echo $electricCar->describe() . PHP_EOL; // Describe electric car
echo $electricCar->chargeBattery() . PHP_EOL; // Charge the electric car's battery

?>