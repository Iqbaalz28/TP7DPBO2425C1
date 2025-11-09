<?php
require_once 'config/db.php';

class Guest {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllGuests() {
        $stmt = $this->db->prepare("SELECT * FROM guests");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createGuest($name, $email, $phone) {
        $stmt = $this->db->prepare("INSERT INTO guests (name, email, phone) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $phone]);
    }

    public function updateGuest($id, $name, $email, $phone) {
        $stmt = $this->db->prepare("UPDATE guests SET name=?, email=?, phone=? WHERE id=?");
        return $stmt->execute([$name, $email, $phone, $id]);
    }

    public function deleteGuest($id) {
        $stmt = $this->db->prepare("DELETE FROM guests WHERE id=?");
        return $stmt->execute([$id]);
    }

    public function getGuestById($id) {
        $stmt = $this->db->prepare("SELECT * FROM guests WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>