<?php
session_start();
if(isset($_SESSION['username'])){
    header("location:profile.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="./style.css"> 
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-primary">
                    <strong id="result"></strong>
                </div>
            </div>
        </div>
  <!-- Login-form -->
        <div class="row justify-content-center">
            <div class="col-lg-4 offet-lg-4 bg-light rounded" id="login-box">
                <h2 class="text-center mt-2"> Login</h2>
                <form action="" method="post" role="form" class="p-2" id="login-frm">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required minlength="3" >
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required minlength="6" >
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck">                     
                            <label for="customCheck" class="custom-control-label">Remember Me </label>
                            <a href="#" id="forgot-btn" class="float-right">Forgot Password?</a>
                        </div>
                    </div>
                    <button class="from-group btn btn-primary btn-block" id="login">Login</button>
                    <div class="form-group">
                        <p class="text-center mt-3">New User? <a href="#" id="register-btn">Register Here</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- registration form -->
        <div class="row justify-content-center">
            <div class="col-lg-4 offet-lg-4 bg-light rounded" id="register-box">
                <h2 class="text-center mt-2">Registration</h2>
                <form action="" method="post" role="form" class="p-2" id="register-frm">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required minlength="3">
                    </div>
                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Username" required minlength="5">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required >
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required minlength="6">                    </div>
                    <div class="form-group">
                        <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
                            <label for="customCheck2" class="custom-control-label">I agree to  the <a href="#"> 
                                terms and conditions</a>  </label>
                        </div>
                    </div>
                    <!-- <div class="from-group">
                        <input type="submit" name="register" id="register" value="Register" class="btn btn-primary btn-block">
                    </div> -->
                    <button class="from-group btn btn-primary btn-block" id="register">Register</button>
                    <div class="form-group">
                        <p class="text-center mt-3">Already Registered? <a href="#" id="login-btn">Login Here</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- forgot password -->
        <div class="row justify-content-center">
            <div class="col-lg-4 offet-lg-4 bg-light rounded" id="forgot-box">
                <h2 class="text-center mt-2"> Reset Password</h2>
                <form action="" method="post" role="form" class="p-2" id="forgot-frm">
                    <div class="form-group">
                        <small class="text-muted">To reset your password, enter the email address.
                             We will send a reset link to your registered email.</small>
                    </div>
                    <div class="form-group">
                        <input type="email" name="femail" class="form-control" placeholder="Email" required>
                    </div>
                    
                    <div class="from-group">
                        <input type="submit" name="forgot" id="forgot" value="Reset" class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                    <a href="#" id="back-btn">Back</a>
                    </div>
                </form>
            </div>
        </div>






    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    
      <!-- <link rel="text/javascript" href="./logic.js"> -->


      <script src="./logic.js"></script>

   

</body>

</html>