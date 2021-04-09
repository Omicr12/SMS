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

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="alert alert-success alert-dismissible" style="display: none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="success-message"></span>
            </div>

            <!--Send otp form-->
            <form id="mobileForm">
                <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" required=""
                           id="mobile">
                    <span class="error-message" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <p>Not registered yet ?<a href="register.php"> Register here</a></p>
                    <button type="submit" class="btn btn-danger" id="sendOtp">Send OTP</button>
                </div>
            </form>

            <!--verify otp-->
            <form id="otpForm" style="display:none;">
                <div class="form-group">
                    <label for="mobile">OTP:</label>
                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP" required="" id="otp">
                    <span class="otp-message" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger" id="verifyOtp">Verify OTP</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        // Send OTP mobile jquery
        $("#sendOtp").on("click", function(e){
            e.preventDefault();
            var mobile = $("#mobile").val();
            $.ajax({
                url  : "ot.php",
                type : "POST",
                cache:false,
                data : {mobile:mobile},
                success:function(result){
                    if (result == "yes") {
                        $("#otpForm,.alert-success").show();
                        $("#mobileForm").hide();
                        $(".success-message").html("OTP sent to your mobile number");
                    }
                    if (result =="no") {
                        $(".error-message").html("Please enter valid mobile number");
                    }
                }
            });
        });

        // Verify OTP mobile jquery
        $("#verifyOtp").on("click",function(e){
            e.preventDefault();
            var otp = $("#otp").val();
            $.ajax({
                url  : "verify.php",
                type : "POST",
                cache:false,
                data : {otp:otp},
                success:function(response){
                    if (response == "yes") {
                        window.location.href='index.php';
                    }
                    if (response =="no") {
                        $(".otp-message").html("Please enter valid OTP");
                    }
                }
            });
        });
    });
</script>

</body>
</html>