<?php
session_start();

// Hardcoded username and password for demonstration
$validUsername = 'user';
$validPassword = 'password123';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username === $validUsername && $password === $validPassword) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to profile page
        header("Location: profile.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Login</h1>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Login</button>
</form>

</body>
</html>

profile.php
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>This is your profile page.</p>

<!-- Logout link -->
<a href="logout.php">Logout</a>

</body>
</html>

logout.php
<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>
