<?php
require_once 'config/db.php';
require_once 'class/Room.php';

class Reservation {
    private $db;
    private $room;

    public function __construct() {
        $this->db = (new Database())->conn;
        $this->room = new Room();
    }

    public function getAllReservations() {
        $stmt = $this->db->prepare("
            SELECT reservations.*, guests.name AS guest_name, rooms.room_number, rooms.type 
            FROM reservations
            JOIN guests ON reservations.guest_id = guests.id
            JOIN rooms ON reservations.room_id = rooms.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createReservation($guest_id, $room_id, $checkin_date, $checkout_date) {
        $stmt = $this->db->prepare("
            INSERT INTO reservations (guest_id, room_id, checkin_date, checkout_date)
            VALUES (?, ?, ?, ?)
        ");

        // Update status room jadi "Booked"
        $this->room->updateRoom($room_id, $room_id, $this->getRoomType($room_id), $this->getRoomPrice($room_id), 'Booked');

        return $stmt->execute([$guest_id, $room_id, $checkin_date, $checkout_date]);
    }

    public function deleteReservation($id) {
        // Ambil room_id untuk mengembalikan status "Available"
        $room = $this->db->prepare("SELECT room_id FROM reservations WHERE id=?");
        $room->execute([$id]);
        $data = $room->fetch();

        $this->room->updateRoom($data['room_id'], $data['room_id'], $this->getRoomType($data['room_id']), $this->getRoomPrice($data['room_id']), 'Available');

        $stmt = $this->db->prepare("DELETE FROM reservations WHERE id=?");
        return $stmt->execute([$id]);
    }

    private function getRoomType($id) {
        $stmt = $this->db->prepare("SELECT type FROM rooms WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }

    private function getRoomPrice($id) {
        $stmt = $this->db->prepare("SELECT price FROM rooms WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }

    public function getReservationById($id) {
        $stmt = $this->db->prepare("SELECT * FROM reservations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateReservation($id, $guest_id, $room_id, $checkin, $checkout) {
        $stmt = $this->db->prepare("UPDATE reservations SET guest_id=?, room_id=?, checkin_date=?, checkout_date=? WHERE id=?");
        return $stmt->execute([$guest_id, $room_id, $checkin, $checkout, $id]);
    }
}
?>