<h3>📋 Reservation List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Guest</th>
        <th>Room</th>
        <th>Room Type</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Action</th>
    </tr>
    <?php foreach ($reservation->getAllReservations() as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= $r['guest_name'] ?></td>
        <td><?= $r['room_number'] ?></td>
        <td><?= $r['type'] ?></td>
        <td><?= $r['checkin_date'] ?></td>
        <td><?= $r['checkout_date'] ?></td>
        <td>
            <a href="?page=reservations&editReservation=<?= $r['id'] ?>">✏️ Edit</a> |
            <a href="?page=reservations&deleteReservation=<?= $r['id'] ?>" onclick="return confirm('Cancel this reservation?')">🗑️</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
if (isset($_GET['editReservation'])) {
    $editRes = $reservation->getReservationById($_GET['editReservation']);
?>
<h3>✏️ Edit Reservation</h3>
<form method="POST" class="form-container">
    <input type="hidden" name="id" value="<?= $editRes['id'] ?>">

    <label>Guest:</label>
    <select name="guest_id" required>
        <?php foreach ($guest->getAllGuests() as $g): ?>
            <option value="<?= $g['id'] ?>" <?= $g['id'] == $editRes['guest_id'] ? 'selected' : '' ?>>
                <?= $g['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Room:</label>
    <select name="room_id" required>
        <?php foreach ($room->getAllRooms() as $r): ?>
            <option value="<?= $r['id'] ?>" <?= $r['id'] == $editRes['room_id'] ? 'selected' : '' ?>>
                <?= $r['room_number'] ?> (<?= $r['type'] ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label>Check-in:</label>
    <input type="date" name="checkin_date" value="<?= $editRes['checkin_date'] ?>" required>
    <label>Check-out:</label>
    <input type="date" name="checkout_date" value="<?= $editRes['checkout_date'] ?>" required>

    <button type="submit" name="updateReservation">Update</button>
</form>
<?php } else { ?>
<h3>➕ Add Reservation</h3>
<form method="POST" class="form-container">
    <label>Guest:</label>
    <select name="guest_id" required>
        <?php foreach ($guest->getAllGuests() as $g): ?>
            <option value="<?= $g['id'] ?>"><?= $g['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Room:</label>
    <select name="room_id" required>
        <?php foreach ($room->getAllRooms() as $r): ?>
            <?php if ($r['status'] == 'Available'): ?>
                <option value="<?= $r['id'] ?>"><?= $r['room_number'] ?> (<?= $r['type'] ?>)</option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <label>Check-in:</label>
    <input type="date" name="checkin_date" required>
    <label>Check-out:</label>
    <input type="date" name="checkout_date" required>

    <button type="submit" name="addReservation">Add Reservation</button>
</form>
<?php } ?>