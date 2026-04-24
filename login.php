<?php
session_start();
include "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: vehicle.php");
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
    background:pink;
    padding:20px;
    width:400px;
    border-radius:10px;
    box-shadow:0px 0px 10px black;
}

.btn{
    padding:10px;
    background:gold;
    border:none;
    margin-top:10px;
    cursor:pointer;
}
</style>

</head>
<body>

<div class="box">
<h1>Welcome Admin</h1>
<p>You are logged in as <?php echo $_SESSION['admin']; ?></p>
<a href="logout.php">Logout</a>

<hr>

<h2>Update Username & Password</h2>

<form method="post">
<label>New Username</label><br>
<input type="text" name="username"><br><br>

<label>New Password</label><br>
<input type="password" name="password"><br><br>

<button type="submit" name="save" class="btn">Save</button>
</form>

<?php
if(isset($_POST['save'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $update = "UPDATE admin SET username='$username', password='$password' WHERE id=1";
    
    if(mysqli_query($conn,$update)){
        echo "<p>Updated Successfully!</p>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
</div>

</body>
</html>
