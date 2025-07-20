<?php
require_once '../config/conn.php';

class PackageController {
// insert packages
    public static function addPackage() { 
        $title          = $_POST['title'] ?? '';
        $price          = $_POST['price'] ?? '';
        $original_price = $_POST['original_price'] ?? '';
        $duration       = $_POST['duration'] ?? '';
        $max_guests     = $_POST['max_guests'] ?? '';
        $location       = $_POST['location'] ?? '';
        $rating         = $_POST['rating'] ?? '';
        $reviews        = $_POST['reviews'] ?? '';
        $popular        = $_POST['popular'] ?? '';
        $description    = $_POST['description'] ?? '';
        $feature1       = $_POST['feature1'] ?? '';
        $feature2       = $_POST['feature2'] ?? '';
        $feature3       = $_POST['feature3'] ?? '';
        $feature4       = $_POST['feature4'] ?? '';
        $feature5       = $_POST['feature5'] ?? '';

        if (
            !$title ||
            !$price ||
            !$original_price ||
            !$duration ||
            !$max_guests ||
            !$location ||
            !$rating ||
            !$reviews ||
            !$popular ||
            !$description ||
            !isset($_FILES['image'])
        ) {
            http_response_code(422);
            echo json_encode(['error' => 'All fields are required']);
            return;
        }

        $upload_dir = '../uploads/packages/';
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

        $imageRelPath = 'uploads/packages/' . $filename;

        try {
            $pdo = getDB();
            $stmt = $pdo->prepare(
                "INSERT INTO packages 
                (title, price, original_price, duration, max_guests, location, image, rating, reviews, popular, description, 
                 feature1, feature2, feature3, feature4, feature5) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->execute([
                $title, $price, $original_price, $duration, $max_guests, $location, $imageRelPath, $rating, $reviews, $popular, $description, 
                $feature1, $feature2, $feature3, $feature4, $feature5
            ]);
            echo json_encode(['success' => true, 'message' => 'Package added']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database insert failed']);
        }
    } 
// get full packages
    public static function getPackages() {
        try {
            $pdo = getDB();
            $stmt = $pdo->query("SELECT id, title, price, original_price, duration, max_guests, location, image, rating, reviews, popular, description, feature1, feature2, feature3, feature4, feature5 FROM packages ORDER BY id DESC");
            $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['success' => true, 'data' => $packages]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database fetch failed']);
        }
    }
// get package via id 
    public static function getPackageId($id) {
        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("SELECT * FROM packages WHERE id = ?");
            $stmt->execute([$id]);
            $pkg = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($pkg) {
                echo json_encode(['success' => true, 'data' => $pkg]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Not found']);
            }
        } catch(PDOException $e) {
            http_response_code(500);
            echo json_encode(['success'=>false, 'error' => 'Database fetch failed']);
        }
    }


   public static function updatePackage($id) {
    $data = json_decode(file_get_contents("php://input"), true);

    $title          = $data['title'] ?? '';
    $price          = $data['price'] ?? '';
    $original_price = $data['original_price'] ?? '';
    $duration       = $data['duration'] ?? '';
    $max_guests     = $data['max_guests'] ?? '';
    $location       = $data['location'] ?? '';
    $rating         = $data['rating'] ?? '';
    $reviews        = $data['reviews'] ?? '';
    $popular        = $data['popular'] ?? '';
    $description    = $data['description'] ?? '';
    $feature1       = $data['feature1'] ?? '';
    $feature2       = $data['feature2'] ?? '';
    $feature3       = $data['feature3'] ?? '';
    $feature4       = $data['feature4'] ?? '';
    $feature5       = $data['feature5'] ?? '';

    try {
        $pdo = getDB();
        $sql = "UPDATE packages SET
            title = ?,
            price = ?,
            original_price = ?,
            duration = ?,
            max_guests = ?,
            location = ?, 
            rating = ?,
            reviews = ?,
            popular = ?,
            description = ?,
            feature1 = ?,
            feature2 = ?,
            feature3 = ?,
            feature4 = ?,
            feature5 = ?
            WHERE id = ?
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $title, $price, $original_price, $duration, $max_guests, $location,
            $rating, $reviews, $popular, $description,
            $feature1, $feature2, $feature3, $feature4, $feature5,
            $id
        ]);
        echo json_encode(['success' => true, 'message' => 'Package updated']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Package update failed']);
    }
}


public static function updatePackageImage($id) { 

    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
        http_response_code(422);
        echo json_encode(['error' => 'No image uploaded']);
        return;
    }


    $upload_dir = '../uploads/packages/';
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

    $imageRelPath = 'uploads/packages/' . $filename;



    try {
        $pdo = getDB();
        $sql = "UPDATE packages SET image = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$imageRelPath, $id]);
        echo json_encode(['success' => true, 'image' => $imageRelPath, 'message' => 'Image updated']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Image update failed']);
    }
}

 public static function deletePackage($id) {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("DELETE FROM packages WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        http_response_code(500); 
        echo json_encode(['success' => false, 'error' => 'Package delete failed']);
    }
}

} 
