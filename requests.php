<?php
include "connect.php";
if(isset($_GET['email']) && isset($_GET['user_mail'])){
    $email = $_GET['email'];
    $user_mail = $_GET['user_mail'];
    echo $email;
    echo $user_email;
    $query1="INSERT INTO requests(request_sender,request_reciver,accept) VALUES('$user_mail','$email',0)";
    $sql1=$conn->query($query1);
    if($sql1==TRUE)
    {
        header("Location: friends.php?email=" . urlencode($user_mail));
        exit();
    }
    else
    {
        header("Location: friends.php?email=" . urlencode($user_mail));
        exit();
    }

} 
else 
{
    echo "Invalid request";
}
?>