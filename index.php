<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<title>VehiclePro</title>

<!-- &#9989; BOOTSTRAP 3 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- &#9989; jQuery (Required for Bootstrap 3) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- &#9989; BOOTSTRAP 3 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- FONT AWESOME CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

/* NAVBAR */

nav{
background:black;
color:white;
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 60px;
position:relative;
}

.logo{
font-size:22px;
font-weight:bold;
}

.menu{
list-style:none;
display:flex;
}

.menu li{
position:relative;
}

.menu a{
color:white;
text-decoration:none;
margin-left:20px;
font-size:15px;
}

.menu a i{
margin-right:6px;
}

/* VEHICLE POPUP */

.popup{
position:absolute;
top:50px;
left:0;
background:white;
padding:25px;
display:none;
gap:40px;
box-shadow:0 10px 20px rgba(0,0,0,0.3);
border-radius:8px;
}

.menu li:hover .popup{
display:flex;
}

/* VEHICLE CARD */

.vehicle{
text-align:center;
width:170px;
}

.vehicle img{
width:160px;
height:100px;
object-fit:cover;
border-radius:6px;
cursor:pointer;
}

.vehicle p{
color:black;
margin-top:8px;
font-weight:bold;
}

.vehicle .desc{
font-size:12px;
color:#666;
margin-top:4px;
margin-bottom:6px;
}

.vehicle a{
display:block;
color:#333;
text-decoration:none;
font-size:14px;
margin-top:4px;
}

.vehicle a:hover{
color:#000;
font-weight:bold;
}

/* HERO */

.hero{
height:90vh;
background:url("https://images.unsplash.com/photo-1503376780353-7e6692767b70") center/cover no-repeat;
display:flex;
justify-content:center;
align-items:center;
}

.hero h1{
color:white;
font-size:60px;
background:rgba(0,0,0,0.5);
padding:20px 40px;
border-radius:10px;
}

/* FOOTER */

footer{
background:#111;
color:white;
padding:40px 60px;
}

.footer-container{
display:flex;
justify-content:space-between;
flex-wrap:wrap;
}

.footer-col{
width:220px;
}

.footer-col h3{
margin-bottom:15px;
}

.footer-col ul{
list-style:none;
}

.footer-col ul li{
margin:8px 0;
}

.footer-col ul li a{
color:#ccc;
text-decoration:none;
}

.footer-col ul li a:hover{
color:white;
}

.footer-col ul li a i{
margin-right:8px;
color:#f1c40f;
}

.footer-bottom{
text-align:center;
margin-top:20px;
color:#aaa;
}

</style>

</head>

<body>

<nav>

<div class="logo">VehiclePro</div>

<ul class="menu">

<li>

<a href="#"><i class="fa fa-car"></i> Vehicles</a>

<div class="popup">

<!-- Model S -->
<div class="vehicle">
<a href="models.php">
<img src="model.jpg" class="image-responsive" alt="res" width="307" height="240">
</a>
<p>Model S</p>
<span class="desc">Luxury electric sedan with long range.</span>
<a href="models.php">Learn</a>
<a href="onlineform.php">Order</a>
</div>

<!-- Model 3 -->
<div class="vehicle">
<a href="model3.php">
<img src="model.jpg2.jpg" class="image-responsive" alt="res" width="307" height="240">
</a>
<p>Model 3</p>
<span class="desc">Affordable electric sedan with smart technology.</span>
<a href="model3.php">Learn</a>
<a href="onlineform.php">Order</a>
</div>

<!-- Model X -->
<div class="vehicle">
<a href="modelx.php">
<img src="photo-1560958089-b8a1929cea89.jpg"  class="image-responsive" alt="res" width="307" height="240">
</a>
<p>Model X</p>
<span class="desc">Luxury SUV with Falcon Wing doors.</span>
<a href="modelx.php">Learn</a>
<a href="onlineform.php">Order</a>
</div>

<!-- Model Y -->
<div class="vehicle">
<a href="modely.php">
<img src="model4.jpg"class="image-responsive" alt="res" width="307" height="240">
</a>

</a>
<p>Model Y</p>
<span class="desc">Compact electric SUV with spacious interior.</span>
<a href="modely.php">Learn</a>
<a href="onlineform.php">Order</a>
</div>

</div>

</li>

<li><a href="onlineform.php"><i class="fa fa-car"></i> Booking</a></li>
<li><a href="vinsert.php"><i class="fa fa-plus"></i> Insert Vehicle</a></li>
<li><a href="admin_login.php"><i class="fa fa-user"></i> Admin</a></li>
<li><a href="admin_dashboard.php"><i class="fa fa-chart-line"></i> Dashboard</a></li>
<li><a href="logout.php"><i class="fa fa-right-from-bracket"></i> Logout</a></li>
<li><a href="dashboard.php"><i class="fa-solid fa-pen-to-square"></i> Dashboard</a></li>

</ul>

</nav>

<section class="hero">
<h1>Premium Car Collection</h1>
</section>

<footer>

<div class="footer-container">

<div class="footer-col">
<h3>VehiclePro</h3>
<p>Premium vehicle rental platform with easy booking.</p>
</div>

<div class="footer-col">
<h3>Quick Links</h3>
<ul>
<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
<li><a href="onlineform.php"><i class="fa fa-car"></i> Booking</a></li>
<li><a href="admin_login.php"><i class="fa fa-user"></i> Admin</a></li>
</ul>
</div>

<div class="footer-col">
<h3>Vehicles</h3>
<ul>
<li><a href="#"><i class="fa fa-car"></i> Model S</a></li>
<li><a href="#"><i class="fa fa-car"></i> Model 3</a></li>
<li><a href="#"><i class="fa fa-car"></i> Model X</a></li>
<li><a href="#"><i class="fa fa-car"></i> Model Y</a></li>
</ul>
</div>

<div class="footer-col">
<h3>Contact</h3>
<ul>
<li><a href="#"><i class="fa fa-location-dot"></i> Bhopal</a></li>
<li><a href="#"><i class="fa fa-phone"></i> +91 9876543210</a></li>
<li><a href="#"><i class="fa fa-envelope"></i> support@vehiclepro.com</a></li>
<li>
<a href="https://www.facebook.com/saumya.shrivastava.14268"><i class="fa-brands fa-facebook"></i></a>
<a href="https://www.instagram.com/saumya.positivevibes?igsh=cjFqcnp3eG1vZjJt"><i class="fa-brands fa-instagram"></i></a>
<a href="https://youtube.com/@rise-i7v?si=1mSpQYpUM1cDWGZf"><i class="fa-brands fa-youtube"></i></a>
<a href="https://web.whatsapp.com/"><i class="fa-brands fa-whatsapp"></i></a>
</li>
</ul>
</div>

</div>

<div class="footer-bottom">
© 2026 VehiclePro. All Rights Reserved.
</div>

</footer>

</body>
</html>

