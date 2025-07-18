<?php

require_once  './header.php';
require_once __DIR__ . '/../controllers/Reviews.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    BookingController::Review();
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Only POST allowed']);
}
