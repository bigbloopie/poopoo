<?php
interface Resizable {
    public function resize($factor);
}

class Square implements Resizable {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function resize($factor) {
        $this->side *= $factor;
    }

    public function getArea() {
        return $this->side * $this->side;
    }
}

// Example Usage
$square = new Square(5);
echo "Original Area: " . $square->getArea() . "\n";
$square->resize(2);
echo "Resized Area: " . $square->getArea() . "\n";
?>
