<?php
if (isset($_COOKIE['visit_counter'])) {
    $visitCount = $_COOKIE['visit_counter'] + 1;
} else {
    $visitCount = 1;
}
setcookie('visit_counter', $visitCount, time() + (365 * 24 * 60 * 60), "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visit Counter</title>
</head>
<body>

<h1>Welcome to Our Website</h1>
<p>You have visited this page <strong><?php echo $visitCount; ?></strong> times.</p>

</body>
</html>
