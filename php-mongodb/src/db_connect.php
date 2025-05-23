<?php
require 'vendor/autoload.php';

// Get credentials from environment (injected via Docker Compose env_file)
$mongoUser = getenv('DB_USER') ?: '';
$mongoPass = getenv('DB_PASSWORD') ?: '';

try {
    // Connect to MongoDB
    $client = new MongoDB\Client("mongodb://$mongoUser:$mongoPass@mongo:27017");

    // Select database
    $db = $client->myapp;

} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "<h3>MongoDB Connection Error:</h3>";
    echo "<pre>" . $e->getMessage() . "</pre>";
    exit;
}