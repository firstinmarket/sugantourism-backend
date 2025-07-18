<?php
require_once '../config/conn.php';

class BookingController {
    public static function submitBooking() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid request body']);
            return;
        }

        $fullName = $data['fullName'] ?? '';
        $email = $data['email'] ?? '';
        $phone = $data['phone'] ?? '';
        $package = $data['package'] ?? '';
        $dates = $data['dates'] ?? '';

        if (!$fullName || !$email || !$phone || !$package || !$dates) {
            http_response_code(422);
            echo json_encode(['error' => 'All fields are required']);
            return;
        }

        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("INSERT INTO bookings (full_name, email, phone, package_selected, preferred_dates) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$fullName, $email, $phone, $package, $dates]);

            echo json_encode(['success' => true, 'message' => 'Booking submitted']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Database insert failed']);
        }
    }
}
