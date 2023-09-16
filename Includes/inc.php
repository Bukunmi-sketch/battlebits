<?php 

   /* The code is importing various class files and creating objects of those classes. */
            //import users class file
    include '../Models/Auth.php';  
    include '../Models/Users.php';  
    include '../Models/Login.php';  
    include '../Models/Register.php'; 
    include '../Models/Transaction.php'; 
   
 
      // create of object of the user class
    $authInstance= new Auth($conn);
    $userInstance= new Users($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
    $transactionInstance = new Transaction($conn);   


   $dirfile="../Images/signup_img/dp--";
   $postdirfile="../Images/post_img/post-image--";
   $coverdirfile="../Images/cover_img/";
   //$dirfile='..../Images/signup_img/'



     ?>