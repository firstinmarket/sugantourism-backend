<?php

require_once  './header.php';


require_once __DIR__ . '/../controllers/inquiries.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
$method=$_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    BookingController::Inquiry();
} 
elseif ($method === 'GET') {
    BookingController::getInquiries();
}
else {
    http_response_code(405);
    echo json_encode(['error' => 'Only POST allowed']);
}
