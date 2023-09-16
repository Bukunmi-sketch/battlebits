<?php 
 /*if( !$authInstance->isloggedin() ){
   $authInstance->redirect('login.php');
  }

  */

  if( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    $authInstance->redirect("login");
  }

  //when users logs out call the logout function and redirect them to the login page.
  if( isset($_GET['logout']) && ($_GET['logout']=='true')  ){
     $authInstance->logout($sessionid);
     $authInstance->redirect("login");
  }

 


?>