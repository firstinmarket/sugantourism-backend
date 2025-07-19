<?php
require_once './header.php';
require_once __DIR__ . '/../controllers/settingsController.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    SettingsController::getSettings();
}elseif ($method === 'PUT') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    SettingsController::updateContactInfo($id);
}  else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}