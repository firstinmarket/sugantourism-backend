<?php

require_once  './header.php'; 
require_once __DIR__ . '/../controllers/PackageController.php';


$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    PackageController::deletePackage($_GET['id']);
}

 else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}
