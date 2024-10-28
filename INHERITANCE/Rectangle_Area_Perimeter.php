<?php
class Rectangle {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }

    public function calculatePerimeter() {
        return 2 * ($this->length + $this->width);
    }
}

// Example Usage
$rectangle = new Rectangle(10, 5);
echo "Area: " . $rectangle->calculateArea() . "\n";
echo "Perimeter: " . $rectangle->calculatePerimeter() . "\n";
?>
