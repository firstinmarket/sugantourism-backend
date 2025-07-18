<?php
require_once './header.php';

require_once '../controllers/GalleryController.php';


$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    GalleryController::getGallery();
} else if ($method === 'POST') {
    GalleryController::addGallery();
} 
 elseif ($method === 'DELETE') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    GalleryController::deleteImg($id);
}else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
