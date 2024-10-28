<?php
function performOperation($operation, $num1, $num2) {
    try {
        switch ($operation) {
            case 'add':
                return $num1 + $num2;
            case 'subtract':
                return $num1 - $num2;
            case 'multiply':
                return $num1 * $num2;
            case 'divide':
                if ($num2 == 0) {
                    throw new Exception("Cannot divide by zero.");
                }
                return $num1 / $num2;
            default:
                throw new Exception("Unsupported operation: $operation.");
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

// Example Usage
$operation = readline("Enter operation (add, subtract, multiply, divide): ");
$num1 = (float)readline("Enter first number: ");
$num2 = (float)readline("Enter second number: ");

$result = performOperation($operation, $num1, $num2);
echo "Result: " . $result . "\n";
?>
