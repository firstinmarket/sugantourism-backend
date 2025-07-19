<?php
require_once '../config/conn.php';

class SettingsController {
    
    public static function getSettings() {
        try {
            $pdo = getDB();
            $stmt = $pdo->query("SELECT `id`, `phone1`, `phone2`, `email`, `whatsapp`, `address`, `location` FROM `settings` ");
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode(['success' => true, 'data' => $data]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to fetch data']);
        }
    }
    public static function updateContactInfo() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (
        !$data
        || !isset($data['phone1'])
        || !isset($data['phone2'])
        || !isset($data['email'])
        || !isset($data['whatsapp'])
        || !isset($data['address'])
        || !isset($data['location'])
    ) {
        http_response_code(422);
        echo json_encode(['error' => 'All fields are required']);
        return;
    }

    try {
        $pdo = getDB(); 
        $stmt = $pdo->prepare("UPDATE settings SET phone1=?, phone2=?, email=?, whatsapp=?, address=?, location=? WHERE id=1");
        $stmt->execute([
            $data['phone1'], $data['phone2'], $data['email'],
            $data['whatsapp'], $data['address'], $data['location']
        ]);
        echo json_encode(['success' => true, 'message' => 'Contact info updated']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database update failed']);
    }
}

}
