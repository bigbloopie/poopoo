survey.php
<?php
session_start();

// Initialize responses array in session if it doesn't exist
if (!isset($_SESSION['responses'])) {
    $_SESSION['responses'] = [];
}

// Store response on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Save the response as an associative array
    $_SESSION['responses'][] = [
        'name' => $name,
        'email' => $email,
        'feedback' => $feedback,
    ];

    // Redirect to view responses page
    header("Location: view_responses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Form</title>
</head>
<body>

<h1>Survey Form</h1>
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="feedback">Feedback:</label><br>
    <textarea id="feedback" name="feedback" rows="4" required></textarea><br><br>

    <button type="submit">Submit</button>
</form>

<a href="view_responses.php">View All Responses</a>

</body>
</html>

view_responses.php
<?php
session_start();

// Check if responses are set in the session
$responses = $_SESSION['responses'] ?? [];

// Clear all responses if requested
if (isset($_GET['clear'])) {
    $_SESSION['responses'] = [];
    header("Location: view_responses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Responses</title>
</head>
<body>

<h1>Survey Responses</h1>

<?php if (empty($responses)): ?>
    <p>No responses have been submitted.</p>
<?php else: ?>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
        </tr>
        <?php foreach ($responses as $response): ?>
            <tr>
                <td><?php echo htmlspecialchars($response['name']); ?></td>
                <td><?php echo htmlspecialchars($response['email']); ?></td>
                <td><?php echo htmlspecialchars($response['feedback']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br>
<a href="survey.php">Back to Survey Form</a>
<a href="view_responses.php?clear=true">Clear All Responses</a>

</body>
</html>

