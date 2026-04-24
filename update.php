<?php
include 'db.php'; // DB connection

// Check ID
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch booking data
$result = mysqli_query($conn, "SELECT * FROM vehicle_bookings WHERE id = $id");

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

$booking = mysqli_fetch_assoc($result);

if (!$booking) {
    echo "Booking not found!";
    exit();
}

// Update booking
if (isset($_POST['update'])) {

    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $vehicle = mysqli_real_escape_string($conn, $_POST['vehicle']);
    $date    = $_POST['booking_date'];
    $amount  = intval($_POST['amount']);

    $update = mysqli_query($conn, "UPDATE vehicle_bookings SET
        name='$name',
        vehicle_name='$vehicle',
        booking_date='$date',
        amount=$amount
        WHERE id=$id
    ");

    if ($update) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
    <style>
        body{
            margin:0;
            font-family:Arial;
            background:#f4f6f9;
        }
        .menu{
            width:200px;
            height:100vh;
            background:#1d976c;
            position:fixed;
        }
        .menu a{
            display:block;
            color:white;
            padding:15px;
            text-decoration:none;
            font-weight:bold;
        }
        .menu a:hover{
            background:#148f65;
        }
        .content{
            margin-left:220px;
            padding:40px;
        }
        .box{
            width:420px;
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.15);
        }
        input, button{
            width:100%;
            padding:10px;
            margin:8px 0;
            border-radius:5px;
            border:1px solid #ccc;
        }
        button{
            background:#1d976c;
            color:white;
            border:none;
            cursor:pointer;
            font-weight:bold;
        }
        button:hover{
            background:#148f65;
        }
        h3{
            color:#1d976c;
            text-align:center;
        }
        label{
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="menu">
    <a href="dashboard.php">Bookings</a>
    <a href="contact.php">Contact</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <div class="box">
        <h3>Edit Booking</h3>

        <!-- 🔴 MAIN FIX IS HERE -->
        <form action="edit.php?id=<?php echo $id; ?>" method="post">

            <label>Name</label>
            <input type="text" name="name" value="<?php echo $booking['name']; ?>" required>

            <label>Vehicle</label>
            <input type="text" name="vehicle" value="<?php echo $booking['vehicle_name']; ?>" required>

            <label>Booking Date</label>
            <input type="date" name="booking_date" value="<?php echo $booking['booking_date']; ?>" required>

            <label>Amount</label>
            <input type="number" name="amount" value="<?php echo $booking['amount']; ?>" required>

            <button type="submit" name="update">Update Booking</button>
        </form>
    </div>
</div>

</body>
</html>