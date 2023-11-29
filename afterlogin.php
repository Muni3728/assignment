<?php
include "connect.php";
if (isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['pwd'];

$query="select count(*) as count from muni_users where EMAIL='$email' and PASSWORD='$password'";
$run=$conn->query($query);
$result1=mysqli_fetch_assoc($run)['count'];
if($result1)
{
    header("Location:user.php?email=$email");
    exit();
}
else{
    header("Location:login.html?");
    exit();
}
}
$conn->close();
?>