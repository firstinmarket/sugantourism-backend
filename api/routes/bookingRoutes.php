<?php
require_once './header.php';
require_once __DIR__ . '/../controllers/BookingController.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    BookingController::submitBooking();
} elseif ($method === 'GET') {
    BookingController::getBookings();
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}