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
    // Account details
    $apiKey = urlencode('OnZXSmVLbWg2anpoQUF4NGs=');
    // Message details
    $numbers = array($mobile);
    $sender  = urlencode('SMSCL');
    $message = rawurlencode('Your One Time Password is '.$otp.' for verification your account.');
    $numbers = implode(',', $numbers);

    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

    // Send the POST request with cURL
    $ch = curl_init('https://sms.arkesel.com/sms/api?action=send-sms&api_key=OnZXSmVLbWg2anpoQUF4NGs=&to=PhoneNumber&from=SenderID&sms=YourMessage');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    // Process your response here
    return $response;
}

?>