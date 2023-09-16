<?php
 
  require '../Includes/db.inc.php';

  include '../Models/Auth.php';    
  include '../Models/Login.php';        
 

    // create of object of the user class
  $authInstance= new Auth($conn);
  $loginInstance= new Login($conn);
  


//check if user is logged in+


$email="";
$password="";


if($_SERVER['REQUEST_METHOD']=="POST"){
       
       $email=$authInstance->validate($_POST['email']);
       $password=$_POST['password'];
      
       if(empty($email) || empty($password)){
            echo "please enter a valid email or password";  
       }else{
           //check if the user may be logged in
           if($logindata=$loginInstance->login($email, $password)){
               session_start();
               //$authInstance->redirect('main.php');               
               $_SESSION['id']=$logindata['id'];
               $_SESSION['email']=$logindata['email'];
               $_SESSION['playername']=$logindata['playername'];
               $_SESSION['loggedin']=true;   
               $ipaddress=$_SERVER['REMOTE_ADDR'];
               $browsertype=$_SERVER['HTTP_USER_AGENT'];
             
              //  //  if($loginInstance->loginSetStatusOnline($_SESSION["id"])){
              //     $loginInstance->lastActivity($_SESSION["id"],$_SESSION["lastactivity"], $_SESSION['lastactivetime'], $_SESSION['lastactivedate'],$_SESSION['datelastactivity']); 
                  $loginInstance->usersLogData($_SESSION["id"],$ipaddress, $browsertype);

                     echo "success";
              // }
              
           }else{
               echo "incorrect credentials";
           }
       }  //empty email and password
 }  //isset login




 ?>