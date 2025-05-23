<?php
$host = 'db'; // The service name from docker-compose.yml
$dbname = 'my_database';
$username = 'root';
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<p class='text-red-500 text-lg font-semibold'>⚠️ Database connection failed. Please try again later:<br>" . $e->getMessage() ."</p>");
}
?>