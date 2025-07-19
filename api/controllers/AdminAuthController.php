<?php
require_once '../config/conn.php';

class AdminAuthController
{

    public static function login()
    {
        session_start();
        $data = json_decode(file_get_contents("php://input"), true);
        $username = trim($data['username'] ?? '');
        $password = $data['password'] ?? '';
        if (!$username || !$password) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Username and password required']);
            return;
        }
        try {
            $pdo = getDB();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $user['password']) {

                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                echo json_encode(['success' => true, 'message' => 'Login successful']);
            } else {
                http_response_code(401);
                echo json_encode(['success' => false, 'error' => 'Invalid credentials']);
            }
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Database error']);
        }
    }
}
