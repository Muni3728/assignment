<?php
include "connect.php";
$email=$_GET['email'];
$emailParts = explode('@', $email);
?>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="friends.css">
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fa-solid fa-bars"></i>
            </label>
            <label class="logo"><?php echo $emailParts[0]; ?></label>
            <ul>
                <li><a class="active" href="user.php">HOME</a></li>
                <li><a  href="friends.php?email=<?php echo $email?>">FRIENDS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </body>
</html>
