<?php
session_start();
include "db.php";

// Session Check
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
body{
    background-color:aqua;
    font-family:Arial;
}

.box{
    background:white;
    padding:20px;
    width:400px;
    border-radius:10px;
    box-shadow:0px 0px 10px black;
    margin:50px auto;
}

.btn{
    padding:10px;
    background:gold;
    border:none;
    cursor:pointer;
    margin-top:10px;
    width:100%;
}
input{
    padding:8px;
    width:100%;
}
</style>
</head>

<body>

<div class="box">
<h1>Welcome Admin</h1>
<p>You are logged in as <b><?php echo $_SESSION['admin']; ?></b></p>
<a href="logout.php">Logout</a>

<hr>

<h2>Update Username & Password</h2>

<form method="post">
<label>New Username</label><br>
<input type="text" name="username" required><br><br>

<label>New Password</label><br>
<input type="password" name="password" required><br><br>

<button type="submit" name="save" class="btn">Save</button>
</form>

<?php
if(isset($_POST['save'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL Update
    $update = "UPDATE admin SET username='$username', password='$password' WHERE id=1";

    if(mysqli_query($conn, $update)){
        echo "<p style='color:green;'>Updated Successfully!</p>";
        $_SESSION['admin'] = $username; // Update session name also
    } else {
        echo "<p style='color:red;'>Error: ".mysqli_error($conn)."</p>";
    }
}
?>
</div>

</body>
</html>
