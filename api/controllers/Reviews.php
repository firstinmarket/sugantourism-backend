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
}
