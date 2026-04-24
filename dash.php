<?php
// Agar database ka naam 'admin' hai:
$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
// --- Add New Booking ---
if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $vehicle = mysqli_real_escape_string($conn, $_POST['vehicle']);
    $date = $_POST['date'];

    mysqli_query($conn, "INSERT INTO admin_vehicle_bookings (name, vehicle, date) VALUES ('$name', '$vehicle', '$date')");
}

// --- Edit Booking ---
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $vehicle = mysqli_real_escape_string($conn, $_POST['vehicle']);
    $date = $_POST['date'];

    mysqli_query($conn, "UPDATE admin_vehicle_bookings SET name='$name', vehicle='$vehicle', date='$date' WHERE id=$id");
}

// --- Delete Booking ---
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM admin_vehicle_bookings WHERE id=$id");
}

// --- Fetch All Bookings ---
$result = mysqli_query($conn, "SELECT * FROM admin_vehicle_bookings ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Vehicle Bookings</title>
    <style>
        body{ font-family: Arial; background:#f4f6f9; margin:0; }
        h2{ text-align:center; color:#1d976c; margin-top:20px; }
        table{ width:90%; margin:20px auto; border-collapse:collapse; background:white; }
        th, td{ border:1px solid #ccc; padding:10px; text-align:center; }
        th{ background:#1d976c; color:white; }
        input[type=text], input[type=date]{ width:90%; padding:5px; }
        button{ padding:5px 10px; margin:2px; border:none; border-radius:4px; cursor:pointer; }
        .update{ background:#1d976c; color:white; }
        .delete{ background:#d63031; color:white; }
        .add{ background:#0984e3; color:white; margin:20px auto; display:block; }
    </style>
</head>
<body>

<h2>Admin Vehicle Bookings</h2>

<!-- Add New Booking Form -->
<form method="post" style="width:90%; margin:0 auto 20px auto; text-align:center;">
    Name: <input type="text" name="name" required>
    Vehicle: <input type="text" name="vehicle" required>
    Date: <input type="date" name="date" required>
    <button type="submit" name="add" class="add">Add Booking</button>
</form>

<!-- Bookings Table -->
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Vehicle</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <form method="post">
        <td><?php echo $row['id']; ?>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </td>
        <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
        <td><input type="text" name="vehicle" value="<?php echo $row['vehicle']; ?>"></td>
        <td><input type="date" name="date" value="<?php echo $row['date']; ?>"></td>
        <td>
            <button type="submit" name="update" class="update">Edit</button>
            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this booking?');">
                <button type="button" class="delete">Delete</button>
            </a>
        </td>
    </form>
</tr>
<?php } ?>
</table>

</body>
</html>