<?php
include "connect.php";
$user_mail=$_GET['user_email'];
$email=$_GET['email'];
$query="update requests set accept=0 where request_sender='$email' and request_reciver='$user_mail'";
$sql1=$conn->query($query);
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
?>