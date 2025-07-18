<?php
require_once '../config/conn.php';

class GalleryController {
    public static function getGallery() {
        try {
            $pdo = getDB();
            $stmt = $pdo->query("SELECT id, category, title, description, image FROM gallery ORDER BY id DESC");
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['success' => true, 'data' => $images]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database fetch failed']);
        }
    }

     public static function deleteImg($id) {
        if (!$id || !is_numeric($id)) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid review id']);
            return;
        }

        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("DELETE FROM gallery WHERE id = ?");
            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => true, 'message' => 'Review deleted']);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Review not found']);
            }
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database delete failed']);
        }
    }

    public static function addGallery() {
        $category = $_POST['category'] ?? '';
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';

        if (!$category || !$title || !$description || !isset($_FILES['image'])) {
            http_response_code(422);
            echo json_encode(['error' => 'All fields are required']);
            return;
        }

        $upload_dir = '../uploads/gallery/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $imageFile = $_FILES['image'];
        $ext = pathinfo($imageFile['name'], PATHINFO_EXTENSION);
        $filename = uniqid('img_', true) . '.' . $ext;
        $target_path = $upload_dir . $filename;

        if (!move_uploaded_file($imageFile['tmp_name'], $target_path)) {
            http_response_code(500);
            echo json_encode(['error' => 'Image upload failed']);
            return;
        }

        $imageRelPath = 'uploads/gallery/' . $filename;

        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("INSERT INTO gallery (category, title, description, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$category, $title, $description, $imageRelPath]);
            echo json_encode(['success' => true, 'message' => 'Image added']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database insert failed']);
        }
    }
}
