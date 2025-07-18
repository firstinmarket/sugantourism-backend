<?php
require_once '../config/conn.php';

class BookingController {
    public static function Inquiry() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid request body']);
            return;
        }

        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $phone = $data['phone'] ?? '';
        $message = $data['message'] ?? '';
 

        if (!$name || !$email || !$phone || !$message ) {
            http_response_code(422);
            echo json_encode(['error' => 'All fields are required']);
            return;
        }

        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("INSERT INTO inquiries (name, phone, email, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $phone, $email, $message]);

            echo json_encode(['success' => true, 'message' => 'Message Submitted']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database insert failed']);
        }
    }
}
