<?php
abstract class Employee {
    protected $name;
    protected $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    abstract public function calculatePay();
}

class HourlyEmployee extends Employee {
    private $hoursWorked;

    public function __construct($name, $salary, $hoursWorked) {
        parent::__construct($name, $salary);
        $this->hoursWorked = $hoursWorked;
    }

    public function calculatePay() {
        return $this->salary * $this->hoursWorked;
    }
}

class SalariedEmployee extends Employee {
    public function calculatePay() {
        return $this->salary / 12;
    }
}

// Example Usage
$hourlyEmployee = new HourlyEmployee("John", 20, 160);
echo "Hourly Employee Pay: " . $hourlyEmployee->calculatePay() . "\n";

$salariedEmployee = new SalariedEmployee("Jane", 60000);
echo "Salaried Employee Monthly Pay: " . $salariedEmployee->calculatePay() . "\n";
?>
