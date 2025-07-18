<?php

require_once  './header.php';
require_once __DIR__ . '/../controllers/Reviews.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    BookingController::Review();
} elseif ($method === 'GET') {
    BookingController::getReviews();
} elseif ($method === 'DELETE') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    BookingController::deleteReview($id);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Only POST allowed']);
}
