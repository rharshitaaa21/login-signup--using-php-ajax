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

     if (strlen($pass) < 6) {
        $errors[] = "Password should be min 6 characters";
    }
if (!preg_match("/\d/", $pass)) {
    $errors[] = "Password should contain at least one digit";
}

if ($errors) {
    foreach ($errors as $error) {
    }
    die();
}
     if($pass != $cpass){
        echo 'Password did not match';
        exit();
     }
     else{
        
        $sql = $conn-> prepare("SELECT username, email FROM users WHERE username=? OR email=?");
        $sql->bind_param("ss", $uname,$email);
        $sql->execute();
        $result =$sql->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if( isset($row['username']) ==$uname){
            echo 'Username not available. Please try something else';
        }
        elseif(isset($row['email'])==$email){
            echo 'Email is already registered';
        }
        else{
            $stmt = $conn->prepare("INSERT into users(name, username, email ,pass, created) VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss",$name,$uname,$email,$passwordHash,$created);
            if($stmt->execute()){
                echo 'Registered Successfully. Login Now!';
            }
            else{
                echo 'Something went wrong. Please try again';
            }
        }    }
    }

if(isset($_POST['action']) && $_POST['action'] == 'login'){
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt_l = $conn->prepare("SELECT * FROM users WHERE username=? ");
   $stmt_l->bind_param("s",$username);
   $stmt_l->execute();

   $result =$stmt_l->get_result();
//    if (!$result) {
//     print_r( mysqli_error($conn));
//     exit();
// }
   $user = $result->fetch_assoc();
//    print_r( $user);


   if($user ){
    if(password_verify($password, $user['pass']))
    $_SESSION['username']=$username;
    

    echo 'Okay'; // control will go to login-ajax function 
   }
   else{
    // print_r( $result );
      echo 'Login Failed! Check your Username and Password';
    
   }

 }
?>