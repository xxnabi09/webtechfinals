<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $username; ?></title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p>Welcome to my page! would you like to logout now?</p>
    <a href="logout.php">Logout</a>
</body>
</html>
