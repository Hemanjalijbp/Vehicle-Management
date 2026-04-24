<?php
include 'db.php';

$success = false;
$error = "";

if(isset($_GET['id'])){

    $id = intval($_GET['id']);

    $delete = mysqli_query($conn, "DELETE FROM vehicle_bookings WHERE id = $id");

    if($delete){
        $success = true;
    } else {
        $error = "Delete failed: " . mysqli_error($conn);
    }

} else {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Booking</title>

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
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,0.15);
    text-align:center;
}
.success{
    color:green;
    font-weight:bold;
    margin-bottom:15px;
}
.error{
    color:red;
    font-weight:bold;
    margin-bottom:15px;
}
.btn{
    display:inline-block;
    padding:10px 20px;
    background:#1d976c;
    color:white;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}
.btn:hover{
    background:#148f65;
}
</style>

<?php if($success): ?>
<meta http-equiv="refresh" content="3;url=dashboard.php">
<?php endif; ?>

</head>

<body>

<div class="menu">
    <a href="dashboard.php">Bookings</a>
    <a href="contact.php">Contact</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <div class="box">
        <?php if($success): ?>
            <h3>Booking Deleted</h3>
            <p class="success">The vehicle booking has been deleted successfully.</p>
            <p>Redirecting to dashboard...</p>
            <br>
            <a class="btn" href="dashboard.php">Go Now</a>
        <?php else: ?>
            <h3>Error</h3>
            <p class="error"><?php echo $error; ?></p>
            <br>
            <a class="btn" href="dashboard.php">Go Back</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
