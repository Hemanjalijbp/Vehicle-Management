<?php

$conn = mysqli_connect("localhost","root","","car_rental_db");

if(!$conn){
die("Database Connection Failed");
}

if(isset($_POST['save'])){

$name=$_POST['name'];
$vehicle=$_POST['vehicle'];
$date=$_POST['date'];
$amount=$_POST['amount'];

$query="INSERT INTO bookings
(customer_name,vehicle_type,booking_date,amount)
VALUES('$name','$vehicle','$date','$amount')";

mysqli_query($conn,$query);

$msg="Booking Saved Successfully";

}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<title>Online Vehicle Booking</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- &#9989; jQuery (Required for Bootstrap 3) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- &#9989; BOOTSTRAP 3 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#4facfe,#00f2fe);
height:100vh;
margin:0;
display:flex;
justify-content:center;
align-items:center;
}

.form-box{
width:360px;
background:#fff;
padding:30px;
border-radius:10px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h2{
text-align:center;
margin-bottom:20px;
}

input,select{
width:100%;
padding:10px;
margin-top:10px;
border:1px solid #ccc;
border-radius:5px;
font-size:15px;
}

button{
width:100%;
padding:12px;
margin-top:15px;
background:#28a745;
color:white;
border:none;
border-radius:5px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#218838;
}

.msg{
text-align:center;
color:green;
font-weight:bold;
margin-bottom:10px;
}

</style>

</head>

<body>

<div class="form-box">

<h2>&#128663; Online Vehicle Booking</h2>

<?php
if(isset($msg)){
echo "<p class='msg'>$msg</p>";
}
?>

<form method="post">

<input type="text" name="name" placeholder="Customer Name" required>

<select name="vehicle" required>
<option value="">Select Vehicle</option>
<option>Car</option>
<option>Bike</option>
<option>Bus</option>
<option>Truck</option>
</select>

<input type="date" name="date" required>

<input type="number" name="amount" placeholder="Amount (&#8377;)" required>

<button type="submit" name="save" class="btn btn-primary">
  Book Vehicle
</button>

</form>

</div>

</body>
</html>