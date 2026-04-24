<?php
session_start();
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: vehicle.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Vehicle Admin Dashboard</title>

<style>
body{
    background:#0f172a;
    color:white;
    font-family:Arial;
}
.box{
    width:500px;
    background:#111827;
    padding:20px;
    border-radius:10px;
    margin:50px auto;
    box-shadow:0 0 15px black;
}
input, button{
    padding:10px;
    width:100%;
    margin-top:10px;
}
button{
    background:gold;
    border:none;
    cursor:pointer;
}
.card{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:10px;
    margin-top:20px;
}
.item{
    background:#1f2937;
    padding:15px;
    border-radius:10px;
    text-align:center;
}
.value{
    font-size:28px;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="box">
<h2>Welcome Admin: <?php echo $_SESSION['admin']; ?></h2>
<a href="logout.php" style="color:red;">Logout</a>

<hr>

<h3>Update Admin Username & Password</h3>

<form method="post">
<input type="text" name="username" placeholder="New Username" required>
<input type="password" name="password" placeholder="New Password" required>
<button type="submit" name="save">Update</button>
</form>
