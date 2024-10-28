<?php
function accessArrayElement($array) {
    while (true) {
        $index = readline("Enter an index to access (0 to " . (count($array) - 1) . "): ");
        try {
            if (!is_numeric($index) || $index < 0 || $index >= count($array)) {
                throw new OutOfRangeException("Index out of bounds. Please enter a valid index.");
            }
            echo "Element at index $index: " . $array[$index] . "\n";
            return; // Exit the loop on success
        } catch (OutOfRangeException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}

// Example Usage
$array = [10, 20, 30, 40, 50]; // Sample array
accessArrayElement($array);
?>
