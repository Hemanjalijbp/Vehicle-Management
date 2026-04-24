<?php
session_start();

$conn = mysqli_connect("localhost","root","","car_rental_db");

if(!$conn){
die("Database Connection Failed: ".mysqli_connect_error());
}

if(!isset($_SESSION['admin'])){
header("Location: admin_login.php");
exit();
}

// Fetch booking data
$booking = mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC");

// Fetch contact data
$contact = mysqli_query($conn,"SELECT * FROM contact ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<title>Admin Dashboard</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- &#9989; jQuery (Required for Bootstrap 3) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- &#9989; BOOTSTRAP 3 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>

body{
font-family:Arial;
background:#f4f4f4;
margin:0;
padding:0;
}

.container{
width:90%;
margin:auto;
margin-top:40px;
}

h2{
text-align:center;
margin-top:40px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
margin-top:20px;
}

table th, table td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

table th{
background:#333;
color:white;
}

.logout{
float:right;
padding:10px 15px;
background:red;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>
</head>

<body>

<div class="container">

<a href="logout.php" class="btn btn-danger">Logout</a>
<h2>Vehicle Booking Records</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Contact</th>
<th>Vehicle</th>
<th>Date</th>
<th>Amount</th>
<th>Created</th>
</tr>

<?php

if($booking && mysqli_num_rows($booking) > 0){

while($row = mysqli_fetch_assoc($booking)){

?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['customer_name']; ?></td>
<td><?php echo $row['contact']; ?></td>
<td><?php echo $row['vehicle_type']; ?></td>
<td><?php echo $row['booking_date']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['created_at']; ?></td>
</tr>

<?php

}

}else{

echo "<tr><td colspan='7'>No Booking Records Found</td></tr>";

}

?>

</table>


<h2>Customer Contact Records</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Contact</th>
<th>Description</th>
</tr>

<?php

if($contact && mysqli_num_rows($contact) > 0){

while($row = mysqli_fetch_assoc($contact)){

?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['contact']; ?></td>
<td><?php echo $row['description']; ?></td>
</tr>

<?php

}

}else{

echo "<tr><td colspan='5'>No Contact Records Found</td></tr>";

}

?>

</table>

</div>

</body>
</html>