<?php

// Start session
session_start();

// Include database connection file

include_once('config.php');

// Send OTP to mobile Form post
if (isset($_POST['mobile'])) {

    $mobile = $con->real_escape_string($_POST['mobile']);
    $otp    = mt_rand(1111, 9999);
    $query  = "SELECT * FROM members WHERE mobile_number = '$mobile'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $con->query("UPDATE members SET otp = '$otp' WHERE mobile_number = '$mobile'");
        // Check mobile number is not empty than send OTP
        if (!empty($mobile)) {
            sendSMS($mobile, $otp);
            $_SESSION['MOBILE'] = $mobile;
        }
        echo "yes";
    }else{
        echo "no";
    }
}


// Create a common function for send SMS
function sendSMS($mobile, $otp) {
    $curl = curl_init('https://sms.arkesel.com/sms/api?action=send-sms&api_key=OnZXSmVLbWg2anpoQUF4NGs=&to='.$mobile.'&from=Nhyiraba&sms=Thanks for registering with us.. Your login code is '.$otp.'');
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET', ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

?>