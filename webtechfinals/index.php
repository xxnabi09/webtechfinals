<?php
// Database configuration
$servername = 'localhost';
$dbname = 'webtechfinals';
$username = 'root';
$password = '';

// PDO connection

    $pdo = new PDO("mysql:host=$servername;dbname=webtechfinals", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print_r($conn);

// User sign-up
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashedPassword = hashPassword($password);

    // Insert user data into the database
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashedPassword]);

    echo "User registered successfully!";
}

// User login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify the password
    if ($user && verifyPassword($password, $user['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
</head>
<body>
    <!-- User Sign-up Form -->
    <h2>Sign-up</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="signup" value="Sign Up">
    </form>

    <!-- User Login Form -->
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
