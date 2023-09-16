<?php
session_start();

include '../Models/Users.php';  
include '../Includes/Auth.php';     

$authInstance= new Auth($conn);
$userInstance= new Users($conn);
$password="";

/* The code is checking if the HTTP request method is "POST". If it is, it retrieves the values of the
"password" and "confirmpassword" fields from the POST data. It also retrieves the value of the "id"
field from the session data. */
if($_SERVER['REQUEST_METHOD']=="POST"){

    $password=$_POST['password'];
    $confirmpass=$_POST['confirmpassword'];
    $sessionid=$_SESSION['id'];
    
   /* The code is performing a series of checks and validations on the password and confirm password
   fields. */
    if(!empty($password) && !empty($confirmpass)){
       /* The code is checking if the password meets certain requirements before updating it in the
       database. */
        if($authInstance->passwordlength($password)){            
            if($authInstance->matchpassword($password, $confirmpass)){
                if($userInstance->changepassword($sessionid, $password)){
                    $_SESSION['verify']=false;
                    echo "password successfully  updated";
                }
            }else{
              echo "password does not match";
            }
        }else{
            echo "password must not be less than 6";
        }
    }else{
        echo "kindly type your password";
    }


}



?>