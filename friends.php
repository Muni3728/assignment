<?php
include "connect.php";
/*$username= $_GET['email'];
$query1="select * from muni_users where EMAIL <> '$username'";
$sql1=$conn->query($query1);
$query2="select * from requests where request_reciver='$username'";
$sql2=$conn->query($query2);
$query3="select * from requests where request_reciver='$username' and accept=1";
$sql3=$conn->query($query3);*/

$username = isset($_GET['email']) ? $_GET['email'] : '';

// Query to get all users except the specified one
$query1 = "SELECT * FROM muni_users WHERE EMAIL <> ?";
$stmt1 = $conn->prepare($query1);
$stmt1->bind_param("s", $username);
$stmt1->execute();
$sql1 = $stmt1->get_result();

// Query to get all incoming friend requests for the specified user
$query2 = "SELECT * FROM requests WHERE request_reciver = ?";
$stmt2 = $conn->prepare($query2);
$stmt2->bind_param("s", $username);
$stmt2->execute();
$sql2 = $stmt2->get_result();

// Query to get accepted friend requests for the specified user
$query3 = "SELECT * FROM requests WHERE request_reciver = ? AND accept = 1";
$stmt3 = $conn->prepare($query3);
$stmt3->bind_param("s", $username);
$stmt3->execute();
$sql3 = $stmt3->get_result();
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
            <label class="logo"><?php echo $username; ?></label>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a class="active" href="friends.php">FRIENDS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="all_users">
            <h2>ALL USERS</h2>
                <?php
                    if(mysqli_num_rows($sql1)>0){
                        while($res=mysqli_fetch_array($sql1)){
                ?>
                <div class="user-container">
                    <span class="name"><?php echo $res['EMAIL']; ?></span>
                    <a href="requests.php?email=<?php echo $res['EMAIL']; ?>&user_mail=<?php echo $username; ?>" class="add-link">
                    <button class="add-button">+</button>
                    </a>
                </div>
                <?php
                        }
                    }
                    else{
                        echo "No Users";
                    }
                ?>
            </div>
            <div class="requests-container">
                <h2>REQUESTS</h2>
                <?php
                    if(mysqli_num_rows($sql2) > 0){
                        while($request = mysqli_fetch_array($sql2)){
                ?>
                <div class="request-container">
                    <span class="request-name"><?php echo $request['request_sender']; ?></span>
                    <a href="accept.php?email=<?php echo $request['request_sender']; ?>&user_mail=<?php echo $username; ?>" class="add-link">
                    <button class="accept-button">Accept</button>
                    </a>
                    <a href="reject.php?email=<?php echo $request['request_sender']; ?>&user_mail=<?php echo $username; ?>" class="add-link">
                    <button class="reject-button">Reject</button>
                    </a>
                </div>
                <?php
                        }
                    }
                    else{
                        echo "No Requests";
                    }
                ?>
            </div>
            <div class="users-container">
            <h2>FRIENDS</h2>
                <?php
                    if(mysqli_num_rows($sql3)>0){
                        while($res=mysqli_fetch_array($sql3)){
                ?>
                <div class="user-friend-container">
                    <span class="name"><?php echo $res['EMAIL']; ?></span>
                </div>
                <?php
                        }
                    }
                    else{
                        echo "No Users";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
