<?php

require_once  './header.php'; 

require_once __DIR__ . '/../controllers/AdminAuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    AdminAuthController::login();
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
