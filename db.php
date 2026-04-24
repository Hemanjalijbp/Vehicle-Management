<?php
$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>