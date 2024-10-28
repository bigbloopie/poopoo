<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['language'])) {
    $selectedLanguage = $_POST['language'];
    // Set a cookie named 'preferred_language' to store the user's selection, expires in 30 days
    setcookie('preferred_language', $selectedLanguage, time() + (30 * 24 * 60 * 60), "/");
    // Reload to apply changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
$preferredLanguage = isset($_COOKIE['preferred_language']) ? $_COOKIE['preferred_language'] : 'not set';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Language Preference</title>
</head>
<body>
<h1>Welcome to Our Website</h1>
<p>Your preferred language is: <strong><?php echo htmlspecialchars($preferredLanguage); ?></strong></p>
<form method="POST" action="">
    <label for="language">Choose your preferred language:</label>
    <select name="language" id="language">
        <option value="English" <?php if ($preferredLanguage == 'English') echo 'selected'; ?>>English</option>
        <option value="Spanish" <?php if ($preferredLanguage == 'Spanish') echo 'selected'; ?>>Spanish</option>
        <option value="French" <?php if ($preferredLanguage == 'French') echo 'selected'; ?>>French</option>
        <option value="German" <?php if ($preferredLanguage == 'German') echo 'selected'; ?>>German</option>
    </select>
    <button type="submit">Save Language Preference</button>
</form>
</body>
</html>