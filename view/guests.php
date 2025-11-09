<h3>👤 Guest List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php foreach ($guest->getAllGuests() as $g): ?>
    <tr>
        <td><?= $g['id'] ?></td>
        <td><?= $g['name'] ?></td>
        <td><?= $g['email'] ?></td>
        <td><?= $g['phone'] ?></td>
        <td>
            <a href="?page=guests&editGuest=<?= $g['id'] ?>">✏️ Edit</a> |
            <a href="?page=guests&deleteGuest=<?= $g['id'] ?>" onclick="return confirm('Delete this guest?')">🗑️</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
if (isset($_GET['editGuest'])) {
    $editGuest = $guest->getGuestById($_GET['editGuest']);
?>
<h3>✏️ Edit Guest</h3>
<form method="POST" class="form-container">
    <input type="hidden" name="id" value="<?= $editGuest['id'] ?>">
    <input type="text" name="name" value="<?= $editGuest['name'] ?>" required>
    <input type="email" name="email" value="<?= $editGuest['email'] ?>" required>
    <input type="text" name="phone" value="<?= $editGuest['phone'] ?>" required>
    <button type="submit" name="updateGuest">Update</button>
</form>
<?php } else { ?>
<h3>➕ Add Guest</h3>
<form method="POST" class="form-container">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <button type="submit" name="addGuest">Add Guest</button>
</form>
<?php } ?>