<?php
require_once '../config/conn.php';

class BookingController {
    public static function Review() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid request body']);
            return;
        }

        $name = $data['name'] ?? '';
        $location = $data['location'] ?? '';
        $review = $data['review'] ?? '';
        $rating = $data['rating'] ?? '';
 
        if (!$name || !$location || !$review || !$rating ) {
            http_response_code(422);
            echo json_encode(['error' => 'All fields are required']);
            return;
        }

        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("INSERT INTO reviews (name, location, review, rating) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $location, $review, $rating]);

            echo json_encode(['success' => true, 'message' => 'Message Submitted']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database insert failed']);
        }
    }

    public static function getReviews() {
        try {
            $pdo = getDB();
            $stmt = $pdo->query("SELECT id, name, location, review, rating, created_at FROM reviews ORDER BY created_at DESC");
            $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['success' => true, 'data' => $reviews]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database fetch failed']);
        }
    }

    public static function deleteReview($id) {
        if (!$id || !is_numeric($id)) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid review id']);
            return;
        }

        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("DELETE FROM reviews WHERE id = ?");
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
}
