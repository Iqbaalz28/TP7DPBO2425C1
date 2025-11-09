<h3>🛏️ Room List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Room Number</th>
        <th>Type</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php foreach ($room->getAllRooms() as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= $r['room_number'] ?></td>
        <td><?= $r['type'] ?></td>
        <td>Rp<?= number_format($r['price'], 0, ',', '.') ?></td>
        <td><?= $r['status'] ?></td>
        <td>
            <a href="?page=rooms&editRoom=<?= $r['id'] ?>">✏️ Edit</a> |
            <a href="?page=rooms&deleteRoom=<?= $r['id'] ?>" onclick="return confirm('Delete this room?')">🗑️</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
// Jika mode edit aktif
if (isset($_GET['editRoom'])) {
    $editRoom = $room->getRoomById($_GET['editRoom']);
?>
<h3>✏️ Edit Room</h3>
<form method="POST" class="form-container">
    <input type="hidden" name="id" value="<?= $editRoom['id'] ?>">
    <input type="text" name="room_number" value="<?= $editRoom['room_number'] ?>" required>
    <input type="text" name="type" value="<?= $editRoom['type'] ?>" required>
    <input type="number" name="price" value="<?= $editRoom['price'] ?>" required>
    <select name="status">
        <option value="Available" <?= $editRoom['status'] == 'Available' ? 'selected' : '' ?>>Available</option>
        <option value="Booked" <?= $editRoom['status'] == 'Booked' ? 'selected' : '' ?>>Booked</option>
    </select>
    <button type="submit" name="updateRoom">Update</button>
</form>
<?php } else { ?>
<h3>➕ Add Room</h3>
<form method="POST" class="form-container">
    <input type="text" name="room_number" placeholder="Room Number" required>
    <input type="text" name="type" placeholder="Room Type" required>
    <input type="number" name="price" placeholder="Price" required>
    <select name="status">
        <option value="Available">Available</option>
        <option value="Booked">Booked</option>
    </select>
    <button type="submit" name="addRoom">Add Room</button>
</form>
<?php } ?>