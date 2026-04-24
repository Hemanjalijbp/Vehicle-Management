<!DOCTYPE html>
<html>
<head>
<title>Online Booking Form</title>

<style>
body{
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    font-size: 16px;
}

/* Form Container */
.form-box{
    width: 400px;
    background: yellow;
    color: maroon;
    padding: 25px;
    margin: 60px auto;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}

/* Heading */
.form-box h2{
    text-align: center;
    color: maroon;
}

/* Labels */
label{
    font-weight: bold;
    display: block;
    margin-top: 10px;
}

/* Inputs */
input, input[type=date], input[type=number]{
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

/* Submit Button */
input[type=submit]{
    background-color: green;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    margin-top: 15px;
}
input[type=submit]:hover{
    background-color: lime;
    color: black;
}

/* Footer */
.footer{
    background-color: darkgreen;
    color: white;
    padding: 20px;
    text-align: center;
}
.footer-container{
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}
.footer-box h3{
    color: pink;
}
.footer-box ul{
    list-style: none;
    padding: 0;
}
.footer-box ul li a{
    color: white;
    text-decoration: none;
}
</style>
</head>

<body>

<div class="form-box">
<h2>Online Vehicle Booking</h2>

<form method="post">
<label>Name</label>
<!-- Added minlength/maxlength for validation -->
<input type="text" name="t1" required minlength="2" maxlength="50">

<label>Vehicle Name</label>
<!-- Added minlength/maxlength for validation -->
<input type="text" name="t2" required minlength="2" maxlength="50">

<label>Date</label>
<input type="date" name="t3" required>

<label>Amount</label>
<!-- Changed type to "number" and added min for validation -->
<input type="number" name="t4" required min="1">

<button type="button" name="submit" class="btn btn-primary">Save</button>
</form>
</div>

<?php
if(isset($_POST["b1"]))
{
    // Updated DB name from "dbtest" to "booking_db"
    $link = mysqli_connect("localhost","root","","booking_db");

    // Check connection
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $name = $_POST["t1"];
    $vehicle = $_POST["t2"];
    $date = $_POST["t3"];
    $amount = $_POST["t4"];

    // Use prepared statements for security and correct data type handling
    $stmt = $link->prepare("INSERT INTO booking(name, vehicle, date, amount) VALUES (?, ?, ?, ?)");
    
    // "sssi" means: s=string, s=string, s=string, i=integer
    $stmt->bind_param("sssi", $name, $vehicle, $date, $amount);

    // Execute the statement
    if($stmt->execute()){
        echo "<h3 style='text-align:center;color:green;'>Data Inserted Successfully</h3>";
    } else {
        // Display a detailed error if insertion fails
        echo "<h3 style='text-align:center;color:red;'>Data Insertion Failed: " . $stmt->error . "</h3>";
    }
    
    // Close statement and connection
    $stmt->close();
    mysqli_close($link);
}
?>

<footer class="footer">
<div class="footer-container">

<div class="footer-box">
<h3>Branded Cars</h3>
<ul>
<li><a href="#">Mercedes</a></li>
<li><a href="#">Nexa Fronx</a></li>
<li><a href="#">Baleno</a></li>
</ul>
</div>

<div class="footer-box">
<h3>Booking</h3>
<ul>
<li><a href="#">Book Now</a></li>
<li><a href="#">Deals & Rewards</a></li>
<li><a href="#">Car Rentals</a></li>
</ul>
</div>

<div class="footer-box">
<h3>Company</h3>
<ul>
<li><a href="#">Career</a></li>
<li><a href="#">Our Story</a></li>
<li><a href="#">Partners</a></li>
</ul>
</div>

</div>
</footer>

</body>
</html>
