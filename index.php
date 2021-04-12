<?php

session_start();

if (isset($_SESSION['MOBILE'])) {
    // echo "Hello" . "  ". "<b>" . ucwords($_SESSION['USERNAME']). "</b>";
}else{
    header("Location:login.php");
    die();
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>
<body>
<br><br>
<h6>WELCOME <?= $_SESSION['USERNAME']?></h6>
<p><a href="logout.php">Logout</a></p>
</body>
</html>