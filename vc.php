<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "vehicle_booking_db");

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$message = "";

// Insert data
if (isset($_POST['save'])) {

    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $vehicle = mysqli_real_escape_string($conn, $_POST['vehicle']);
    $date    = $_POST['date'];
    $amount  = $_POST['amount'];

    // ✅ column name FIXED: booking_name
    $sql = "INSERT INTO vehicle_bookings 
            (name, vehicle_name, booking_name, amount) 
            VALUES 
            ('$name', '$vehicle', '$date', '$amount')";

    if (mysqli_query($conn, $sql)) {
        $message = "✅ Booking Saved Successfully";
    } else {
        $message = "❌ Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Vehicle Booking</title>

<style>
body{
    background: linear-gradient(135deg,#1d976c,#93f9b9);
    font-family: Arial;
}
.form-box{
    width:400px;
    background:#fff;
    padding:25px;
    margin:60px auto;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
h2{
    text-align:center;
    color:orange;
}
label{
    font-weight:bold;
    margin-top:10px;
    display:block;
}
input{
    width:100%;
    padding:10px;
    margin-top:5px;
}
input[type=submit]{
    background:#1d976c;
    color:white;
    border:none;
    margin-top:15px;
    cursor:pointer;
}
.msg{
    text-align:center;
    font-weight:bold;
    margin-bottom:10px;
    color:green;
}
</style>
</head>

<body>

<div class="form-box">
<h2>🚗 Online Vehicle Booking</h2>

<?php if($message!=""){ ?>
<div class="msg"><?php echo $message; ?></div>
<?php } ?>

<form method="post">
<label>Name</label>
<input type="text" name="name" required>

<label>Vehicle Name</label>
<input type="text" name="vehicle" required>

<label>Date</label>
<input type="date" name="date" required>

<label>Amount</label>
<input type="number" name="amount" required>

<input type="submit" name="save" value="Save Booking">
</form>

</div>

</body>
</html>