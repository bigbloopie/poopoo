<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
        setcookie('username', $username, time() + (30 * 24 * 60 * 60), "/");
    
    header("Location: homepage.php");
    exit();
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
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <button type="submit">Login</button>
</form>

</body>
</html>

//HOMEPAGE
<?php
session_start();

if (isset($_COOKIE['username'])) {
    $username = htmlspecialchars($_COOKIE['username']);
} else {
    // If no cookie is set, redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>

<h1>Welcome, <?php echo $username; ?>!</h1>
<p>Glad to see you back.</p>

<!-- Link to logout page -->
<a href="logout.php">Logout</a>

</body>
</html>


//LOGOUT
<?php
session_start();

setcookie('username', '', time() - 3600, "/");

header("Location: login.php");
exit();
?>
