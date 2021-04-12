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
        <div class="col-md-3">
            <h6 class="text-center text-secondary">LOGIN</h6>
        </div>
        <div class="col-md-6 bg-light">
            <form id="submitt">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
                </div>
               <!--  <div class="form-group">
                    <label for="mobile">Mobile Number:</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile number" required="">
                </div> -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required="">
                </div>
                <div class="form-group">
                    <p>No account ?<a href="register.php" class="text-danger"> Register here</a></p>
                    <button type="submit" class="btn btn-danger">Enter</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--ajax script for registration-->
<script>
    $(document).ready(function(){
        $("#submitt").on("submit", function(e){
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url  : "use.php",
                type : "POST",
                cache:false,
                data : formData,
                success:function(result){
                    if (result == "yes") {
                        // alert("Registration sucessful,Please login");
                        window.location ='index.php';
                    }else{
                        alert("Wrong Details");
                    }
                }
            });
        });
    });
</script>

</body>
</html>