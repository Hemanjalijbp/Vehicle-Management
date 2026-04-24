<?php
session_start();
$conn = mysqli_connect("localhost","root","","car_rental_db");

if(!$conn){
    die("Database Connection Failed: ".mysqli_connect_error());
}

// Agar already logged in hai, dashboard bhejo
if(isset($_SESSION['admin'])){
    header("Location: admin_dashboard.php");
    exit();
}

$error = "";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<title>Admin Login</title>
<!-- &#9989; BOOTSTRAP 3 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- &#9989; jQuery (Required for Bootstrap 3) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- &#9989; BOOTSTRAP 3 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
body{font-family:Arial;background:#f4f4f4;margin:0;padding:0;}
.login-container{width:400px;margin:100px auto;background:#fff;padding:30px;border-radius:5px;box-shadow:0 0 10px #aaa;}
h2{text-align:center;}
input[type=text], input[type=password]{width:100%;padding:12px;margin:10px 0; border:1px solid #ccc;border-radius:4px;}
input[type=submit]{width:100%;padding:12px;background:#333;color:#fff;border:none;border-radius:4px;cursor:pointer;}
.error{color:red;text-align:center;}
</style>
</head>
<body>
<div class="login-container">
<h2>Admin Login</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<input type="submit" name="login" value="Login" class="btn btn-primary">
</form>
<?php if($error){ echo "<p class='error'>$error</p>"; } ?>
</div>
</body>
</html>