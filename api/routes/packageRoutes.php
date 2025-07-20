<?php

require_once  './header.php'; 
require_once __DIR__ . '/../controllers/PackageController.php';


$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    PackageController::addPackage();
}
elseif ($method === 'GET') {
    if (isset($_GET['id'])) {
        PackageController::getPackageId($_GET['id']);
    } else {
        PackageController::getPackages();
    }
}
elseif ($method  === 'PUT') {
    PackageController::updatePackage($_GET['id']);
}
elseif ($method  === 'PUT') {
    PackageController::updatePackageImage($_GET['id']);
}
elseif ($method  === 'POST') {
    PackageController::deletePackage($_GET['id']);
}
 else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}
