<?php
require 'config.php';
if(isset($_POST['action']) && $_POST['action'] == 'register'){

     $name = check_input($_POST['name']);
     $uname = check_input($_POST['uname']);
     $email = check_input($_POST['email']);
     $pass = check_input($_POST['pass']);
     $cpass = check_input($_POST['cpass']);
     $pass = sha1($pass);
     $cpass = sha1($cpass);
     $created = date('Y-m-d');

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
            $stmt->bind_param("sssss",$name,$uname,$email,$pass,$created);
            if($stmt->execute()){
                echo 'Registered Successfully. Login Now!';
            }
            else{
                echo 'Something went wrong. Please try again';
            }
        }
     }
    
    


}
function check_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}
?>