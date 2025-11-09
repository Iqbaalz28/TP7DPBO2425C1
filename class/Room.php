<?php
require_once 'config/db.php';

class Room {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllRooms() {
        $stmt = $this->db->prepare("SELECT * FROM rooms");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createRoom($room_number, $type, $price, $status) {
        $stmt = $this->db->prepare("INSERT INTO rooms (room_number, type, price, status) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$room_number, $type, $price, $status]);
    }

    public function updateRoom($id, $room_number, $type, $price, $status) {
        $stmt = $this->db->prepare("UPDATE rooms SET room_number=?, type=?, price=?, status=? WHERE id=?");
        return $stmt->execute([$room_number, $type, $price, $status, $id]);
    }

    public function deleteRoom($id) {
        $stmt = $this->db->prepare("DELETE FROM rooms WHERE id=?");
        return $stmt->execute([$id]);
    }

    public function getRoomById($id) {
        $stmt = $this->db->prepare("SELECT * FROM rooms WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>