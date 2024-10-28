<?php
class Student {
    private $name;
    private $age;
    private $grade;

    public function __construct($name, $age, $grade) {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    public function displayInfo() {
        echo "Name: $this->name, Age: $this->age, Grade: $this->grade\n";
    }
}

// Example Usage
$student = new Student("John Doe", 20, "A");
$student->displayInfo();
?>
