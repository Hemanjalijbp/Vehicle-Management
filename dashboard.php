<?php
session_start();

$conn = mysqli_connect("localhost","root","","car_rental_db");

if(!$conn){
die("Database Connection Failed: ".mysqli_connect_error());
}

/* ADMIN LOGIN */
if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($result) > 0){

$_SESSION['admin'] = $username;

header("Location: admin_dashboard.php");
exit();

}else{
$error="Invalid Username or Password";
}
}

/* LOGOUT */
if(isset($_GET['logout'])){
session_destroy();
header("Location: admin_dashboard.php");
exit();
}

/* DELETE BOOKING */
if(isset($_GET['delete'])){
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM bookings WHERE id='$id'");
header("Location: admin_dashboard.php");
exit();
}

/* EDIT BOOKING */
$edit_id=0;
$customer_name='';
$vehicle_type='';
$booking_date='';
$amount='';

if(isset($_GET['edit'])){

$edit_id=$_GET['edit'];

$res=mysqli_query($conn,"SELECT * FROM bookings WHERE id='$edit_id'");
$row=mysqli_fetch_assoc($res);

$customer_name=$row['customer_name'];
$vehicle_type=$row['vehicle_type'];
$booking_date=$row['booking_date'];
$amount=$row['amount'];
}

/* UPDATE BOOKING */
if(isset($_POST['update'])){

$id=$_POST['id'];
$customer_name=$_POST['customer_name'];
$vehicle_type=$_POST['vehicle_type'];
$booking_date=$_POST['booking_date'];
$amount=$_POST['amount'];

mysqli_query($conn,"UPDATE bookings SET
customer_name='$customer_name',
vehicle_type='$vehicle_type',
booking_date='$booking_date',
amount='$amount'
WHERE id='$id'");

header("Location: admin_dashboard.php");
exit();
}

/* INSERT BOOKING */
if(isset($_POST['add'])){

$customer_name=$_POST['customer_name'];
$vehicle_type=$_POST['vehicle_type'];
$booking_date=$_POST['booking_date'];
$amount=$_POST['amount'];

mysqli_query($conn,"INSERT INTO bookings
(customer_name,vehicle_type,booking_date,amount,created_at)
VALUES
('$customer_name','$vehicle_type','$booking_date','$amount',NOW())");

header("Location: admin_dashboard.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<title>Admin Panel</title>
<!-- &#9989; BOOTSTRAP 3 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- &#9989; jQuery (Required for Bootstrap 3) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- &#9989; BOOTSTRAP 3 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>

body{
font-family:Arial;
background:#f4f4f4;
padding:20px;
}

/* LOGIN BOX */

.login-box{
width:320px;
margin:auto;
background:white;
padding:25px;
border-radius:6px;
box-shadow:0 0 10px #ccc;
}

input{
width:100%;
padding:8px;
margin:6px 0;
}

button{
padding:10px;
width:100%;
background:green;
color:white;
border:none;
cursor:pointer;
}

button:hover{
background:#0a7a0a;
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
background:white;
}

th,td{
border:1px solid #ddd;
padding:10px;
text-align:center;
}

th{
background:#333;
color:white;
}

a{
text-decoration:none;
padding:6px 10px;
color:white;
border-radius:4px;
}

.edit{background:blue;}
.delete{background:red;}
.logout{background:black;float:right;}

.form-box{
width:420px;
margin:auto;
background:white;
padding:20px;
margin-top:20px;
border-radius:6px;
}

</style>

</head>

<body>

<?php if(!isset($_SESSION['admin'])){ ?>

<div class="login-box">

<h3 align="center">Admin Login</h3>

<?php if(isset($error)){ echo "<p style='color:red'>$error</p>"; } ?>

<form method="post">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

</div>

<?php } else { ?>

<a class="logout" href="?logout=true">Logout</a>

<h2 align="center">Vehicle Booking Dashboard</h2>

<div class="form-box">

<form method="post">

<input type="hidden" name="id" value="<?php echo $edit_id; ?>">

<label>Customer Name</label>
<input type="text" name="customer_name" value="<?php echo $customer_name; ?>" required>

<label>Vehicle Type</label>
<input type="text" name="vehicle_type" value="<?php echo $vehicle_type; ?>" required>

<label>Booking Date</label>
<input type="date" name="booking_date" value="<?php echo $booking_date; ?>" required>

<label>Amount</label>
<input type="number" name="amount" value="<?php echo $amount; ?>" required>

<?php if($edit_id>0){ ?>

<button type="submit" name="update">Update Booking</button>

<?php } else { ?>

<button type="submit" name="add">Add Booking</button>

<?php } ?>

</form>

</div>

<table>

<tr>
<th>ID</th>
<th>Customer Name</th>
<th>Vehicle Type</th>
<th>Booking Date</th>
<th>Amount</th>
<th>Created</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['customer_name']; ?></td>
<td><?php echo $row['vehicle_type']; ?></td>
<td><?php echo $row['booking_date']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['created_at']; ?></td>

<td>

<a class="edit" href="?edit=<?php echo $row['id']; ?>">Edit</a>

<a class="delete" href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete record?')">Delete</a>

</td>

</tr>

<?php } ?>

</table>

<?php } ?>

</body>
</html>