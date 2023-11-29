<?php
include "connect.php";
if (isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['pwd'];

$query="select count(*) as count from muni_users where EMAIL='$email'";
$run=$conn->query($query);
$result1=mysqli_fetch_assoc($run)['count'];
if($result1)
{
    header("Location:index.html?");
    exit();
}
else{
$sql="INSERT INTO muni_users(EMAIL,PASSWORD) VALUES('$email','$password')";

$result=$conn->query($sql);

if($result==TRUE){
    header("Location:index.html?");
    exit();
}
else{
    header("Location:signup.html?");
    exit();
}
}
}
$conn->close();
?>