<?php
require 'config.php';

if(isset($_POST['action']) && $_POST['action'] == 'register'){
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $created = date('Y-m-d');
    $passwordHash = password_hash($pass,PASSWORD_DEFAULT);

    $errors = array(); 

    if(empty($name) || empty($uname) || empty($email) || empty($pass) || empty($cpass))
    {
      array_push($errors, "All fields are required");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      array_push($errors, "Email is not valid");
    }
    if(strlen($pass) < 6)
    {
      array_push($errors, "Password must be at least 6 characters long");
    }
    if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $pass))
    {
        array_push($errors, "Password must contain at least one special character");
    }
    if($pass !== $cpass)
    {
      array_push($errors, "Passwords do not match");
    }
    
    if(count($errors) > 0)
    {
        $response = implode('<br>', $errors);
        echo $response;
    }
    else
    {
        $stmt = $conn->prepare("SELECT username, email FROM users WHERE username=? OR email=?");
        $stmt->bind_param("ss", $uname, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if($row != null && $row['username'] == $uname){
            $response = 'Username not available. Please try something else';
            echo $response;
        }
        elseif($row != null && $row['email'] == $email){
            $response = 'Email is already registered';
            echo $response;
        }
        else
        {
            $stmt = $conn->prepare("INSERT into users(name, username, email, pass, created) VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss", $name, $uname, $email, $passwordHash, $created);
            if($stmt->execute())
            {
                $response = 'Registered Successfully. Login Now!';
                echo $response;
            }
            else
            {
                $response = 'Something went wrong. Please try again';
                echo $response;
            }
        }
    }
} 



if(isset($_POST['action']) && $_POST['action'] == 'login'){
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt_l = $conn->prepare("SELECT * FROM users WHERE username=? ");
    $stmt_l->bind_param("s",$username);
    $stmt_l->execute();

    $result =$stmt_l->get_result();

    $user = $result->fetch_assoc();
    if ($user) {
        if (password_verify($password, $user['pass'])) {
            $_SESSION['username'] = $username;
            echo 'Okay'; // control will go to login-ajax function 
        } else {
            echo 'Login Failed! Incorrect Password';
        }
    } 
    else{
        echo 'User does not exist!';
    }
}


?>