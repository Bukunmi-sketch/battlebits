<?php


include '../Models/Auth.php';
include '../Models/Users.php';    

$userInstance= new Users($conn);
$authInstance=new Auth($conn);

if($_SERVER['REQUEST_METHOD']=="POST"){

$sessionid=$_POST['id'];
$count=$_POST['moreusers'];
$dirfile="../Images/signup_img/dp--";
$nullimage="../Images/signup_img/dp--null.png";
$postdirfile="../Images/post_img/dp--";



         /* The line `->moreusers(,,,);` is calling the
         `moreusers` method of the `` object. This method is passing four parameters:
         ``, ``, ``, and ``. The purpose and functionality of the
         `moreusers` method would need to be defined in the `Users` class. */
          $userInstance->moreusers($dirfile,$nullimage,$sessionid,$count);
      



}

?>