<?php
function divide($numerator, $denominator) {
    if ($denominator == 0) {
        throw new Exception("Cannot divide by zero.");
    }
    return $numerator / $denominator;
}

// Example Usage
try {
    $num1 = 10;  // Change these values to test
    $num2 = 0;   // Change this to a non-zero number to avoid exception
    $result = divide($num1, $num2);
    echo "Result: " . $result . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
