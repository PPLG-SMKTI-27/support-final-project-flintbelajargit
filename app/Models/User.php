<?php
require_once __DIR__ . '/../../config/Database.php';
class User {
    private $conn;
    private $table = "users";
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
    public function all() {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data, $file) {
        $photo = null;
        if (!empty($file['name'])) {
            $filename = time() . '_' . basename($file['name']);
            $path = __DIR__ . '/../../public/uploads/' . $filename;
            move_uploaded_file($file['tmp_name'], $path);
            $photo = $filename;
        }
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, photo) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['email'], $photo]);
    }
}
?>