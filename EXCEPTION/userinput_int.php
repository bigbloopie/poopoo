<?php
function getIntegerInput() {
    while (true) {
        $input = readline("Please enter an integer: ");
        try {
            if (!is_numeric($input)) {
                throw new Exception("Invalid input. Please enter a valid integer.");
            }
            return (int)$input; // Casting to integer
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}

// Example Usage
$integerInput = getIntegerInput();
echo "You entered: " . $integerInput . "\n";
?>
