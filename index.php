<?php
require_once 'class/Room.php';
require_once 'class/Guest.php';
require_once 'class/Reservation.php';

$room = new Room();
$guest = new Guest();
$reservation = new Reservation();

// === HANDLE CRUD REQUEST ===

// 🛏️ ROOM CRUD
if (isset($_POST['addRoom'])) {
    $room->createRoom($_POST['room_number'], $_POST['type'], $_POST['price'], $_POST['status']);
}
if (isset($_POST['updateRoom'])) {
    $room->updateRoom($_POST['id'], $_POST['room_number'], $_POST['type'], $_POST['price'], $_POST['status']);
}
if (isset($_GET['deleteRoom'])) {
    $room->deleteRoom($_GET['deleteRoom']);
}

// 👤 GUEST CRUD
if (isset($_POST['addGuest'])) {
    $guest->createGuest($_POST['name'], $_POST['email'], $_POST['phone']);
}
if (isset($_POST['updateGuest'])) {
    $guest->updateGuest($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone']);
}
if (isset($_GET['deleteGuest'])) {
    $guest->deleteGuest($_GET['deleteGuest']);
}

// 📋 RESERVATION CRUD
if (isset($_POST['addReservation'])) {
    $reservation->createReservation($_POST['guest_id'], $_POST['room_id'], $_POST['checkin_date'], $_POST['checkout_date']);
}
if (isset($_POST['updateReservation'])) {
    $reservation->updateReservation($_POST['id'], $_POST['guest_id'], $_POST['room_id'], $_POST['checkin_date'], $_POST['checkout_date']);
}
if (isset($_GET['deleteReservation'])) {
    $reservation->deleteReservation($_GET['deleteReservation']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🏨 Hotel Reservation System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>

    <main>
        <h2>Welcome to Hotel Reservation System</h2>
        <nav>
            <a href="?page=rooms">Rooms</a> |
            <a href="?page=guests">Guests</a> |
            <a href="?page=reservations">Reservations</a>
        </nav>

        <section class="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'rooms') include 'view/rooms.php';
            elseif ($page == 'guests') include 'view/guests.php';
            elseif ($page == 'reservations') include 'view/reservations.php';
        } else {
            echo "<p>Select a menu above to manage hotel data.</p>";
        }
        ?>
        </section>
    </main>

    <?php include 'view/footer.php'; ?>
</body>
</html>