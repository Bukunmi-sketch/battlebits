<?php
  session_start();
   
  
 // create of object of the user class
  $authInstance= new Auth($conn);
  $userInstance= new Users($conn);
  $loginInstance= new Login($conn);
  $registerInstance= new Register($conn);
  $imgInstance= new Uploadimg($conn);
 



$sessionid=$_SESSION['id'];
$email=$_SESSION['email'];
if(!$authInstance->isloggedin()){
    $authInstance->redirect('signup.php');
    exit();
}


 
 
$biotext="";
$dp="";
 
 
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $biotext=$authInstance->validate($_POST['textbio']); 
  //  $biotext=$authInstance->escapeString($biotext);
  //  $imagename=$_FILES['dpic'];
    $dp=$_FILES['dpic']["name"];
    $dpsize=$_FILES['dpic']['size'];
    $dptemp=$_FILES['dpic']['tmp_name'];

    //$dir="images/";
    $dir="../Images/signup_img/dp--";
    $dirfile=$dir.basename($dp);




    if(!empty($dp) && !empty($biotext)){

              if($imgInstance->imgextension($dp)){
                    if($imgInstance->largeImage($dpsize)){
                        if($imgInstance->moveImage($dptemp, $dirfile)){
                            if($imgInstance->updateImage( $dp, $biotext, $sessionid)){
                                echo "success";
                           }else{
                               echo "an error occurred while uploading the image";
                           }
                        }else{
                            echo "file failed to move";
                        }
                    }else{
                        echo "image is too large";
                    }     
             }else{
                echo 'file is not an image';
              }



    }else{
        echo 'all files are required to be filled';
    }

}


?>