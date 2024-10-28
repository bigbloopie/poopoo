//add_to_cart.php
<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemName = $_POST['item_name'];
    $quantity = (int)$_POST['quantity'];

    // Update quantity if item exists, otherwise add new item
    if (isset($_SESSION['cart'][$itemName])) {
        $_SESSION['cart'][$itemName] += $quantity;
    } else {
        $_SESSION['cart'][$itemName] = $quantity;
    }

    // Redirect to view cart page
    header("Location: view_cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add to Cart</title>
</head>
<body>

<h1>Add Item to Cart</h1>
<form method="POST" action="">
    <label for="item_name">Item Name:</label>
    <input type="text" id="item_name" name="item_name" required>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" required>

    <button type="submit">Add to Cart</button>
</form>

<a href="view_cart.php">View Cart</a>

</body>
</html>

//viewcart.php
<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Remove an item from the cart
if (isset($_GET['remove'])) {
    $itemName = $_GET['remove'];
    unset($_SESSION['cart'][$itemName]);
    header("Location: view_cart.php");
    exit();
}

// Clear the entire cart
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
    header("Location: view_cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Cart</title>
</head>
<body>

<h1>Your Shopping Cart</h1>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $item => $quantity): ?>
            <tr>
                <td><?php echo htmlspecialchars($item); ?></td>
                <td><?php echo htmlspecialchars($quantity); ?></td>
                <td>
                    <a href="view_cart.php?remove=<?php echo urlencode($item); ?>">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="view_cart.php?clear=true">Clear Cart</a>
<?php endif; ?>

<br><br>
<a href="add_to_cart.php">Add More Items</a>

</body>
</html>

