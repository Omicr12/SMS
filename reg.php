<?php
include_once('config.php');


if (isset($_POST['email'])) {

$username=$con->real_escape_string($_POST['name']);
$mobile = $con->real_escape_string($_POST['mobile']);
$email  = $con->real_escape_string($_POST['email']);

$otp    = mt_rand(1111, 9999);

$query  = "INSERT INTO members (username,email,mobile_number,otp) VALUES ('$username','$email','$mobile','$otp')";
$result = $con->query($query);

if ($result) {
echo "yes";
}else{
echo "no";
}

}
?>