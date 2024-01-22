<?php
// Database configuration
$host = 'localhost'; // Replace with your MySQL server host
$dbname = 'WEBTECHFINALS'; // Replace with your database name
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password

// Establish a PDO database connection
try {
    $dsn = "mysql:host=$localhost;dbname=$WEBTECHFINALS";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
