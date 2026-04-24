<?php
$conn = mysqli_connect("localhost","root","","car_rental_db");

if(!$conn){
    die("Database Connection Failed: ".mysqli_connect_error());
}

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];

    $query = "INSERT INTO contact(name,address,contact,description)
    VALUES('$name','$address','$contact','$description')";

    if(mysqli_query($conn,$query)){
        $msg = "Data Saved Successfully";
    }else{
        $msg = "Error: ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<title>Customer Contact Form</title>
<!-- &#9989; BOOTSTRAP 3 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- &#9989; jQuery (Required for Bootstrap 3) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- &#9989; BOOTSTRAP 3 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- FONT AWESOME CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<style>

body{
font-family:Arial;
background:#f4f4f4;
}

.form-box{
width:600px;
background:white;
padding:25px;
margin:60px auto;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.2);
}

h2{
text-align:center;
color:maroon;
}

label{
font-weight:bold;
display:block;
margin-top:10px;
}

input,textarea{
width:100%;
padding:8px;
border:1px solid #ccc;
border-radius:5px;
margin-top:5px;
}

button{
background:maroon;
color:white;
padding:10px;
border:none;
border-radius:5px;
cursor:pointer;
width:100%;
margin-top:15px;
}

button:hover{
background:gold;
color:maroon;
}

.success{
text-align:center;
color:green;
margin-top:10px;
}

footer{
background:maroon;
color:white;
text-align:center;
padding:10px;
position:fixed;
bottom:0;
width:100%;
}

</style>
</head>

<body>

<div class="form-box">

<h2>Customer Contact Form</h2>

<form method="post">

<label>Customer Name</label>
<input type="text" name="name" required>

<label>Address</label>
<input type="text" name="address" required>

<label>Contact</label>
<input type="text" name="contact" required>

<label>Description</label>
<textarea name="description" rows="4"></textarea>

<button type="submit" name="submit" class="btn btn-sucees">
    Save
</button></form>

<?php
if(isset($msg)){
echo "<p class='success'>$msg</p>";
}
?>

</div>

<footer>
© 2026 | Vehicle Contact System
</footer>

</body>
</html>