<?php
session_start();
include_once('config.php');


if (isset($_POST['email'])) {

$username=$con->real_escape_string($_POST['name']);
// $mobile = $con->real_escape_string($_POST['mobile']);
$email  = $con->real_escape_string($_POST['email']);

$otp    = mt_rand(1111, 9999);

$query  = "SELECT * FROM members WHERE username='$username' AND email= '$email'";
$result = $con->query($query);

if (mysqli_fetch_row($result)>0) {
echo "yes";
$_SESSION['USERNAME'] = $username;
}else{
echo "no";
}

}
?>