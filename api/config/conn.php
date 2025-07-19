<?php


// $host = 'localhost';
// $db   = 'sugantourism';
// $user = 'root';
// $pass = '';
// $charset = 'utf8mb4';

$host = 'localhost';
$db   = 'gnthealt_sugan';
$user = 'gnthealt_sugan';
$pass = '7@f~WFkXV6@Q_9-Q';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

function getDB() {
    global $pdo;
    return $pdo;
}