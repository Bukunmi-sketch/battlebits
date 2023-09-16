<?php
session_start();


include '../Models/Auth.php';  
include '../Models/Users.php';  
include '../Models/Login.php';  
include '../Models/Register.php';  
include '../Models/Uploadimg.php';    




  /* These lines of code are creating instances of different classes. Each instance is being assigned
  to a variable (``, ``, ``, ``,
  ``). These instances are created using the `new` keyword followed by the class name
  and passing the `` variable as a parameter. The `` variable is likely a database
  connection object that is being passed to these classes for database operations. */
  $authInstance= new Auth($conn);
  $userInstance= new Users($conn);
  $loginInstance= new Login($conn);
  $registerInstance= new Register($conn);
  $imgInstance= new Uploadimg($conn);

if($_SERVER["REQUEST_METHOD"]=="POST"){

    /* The code is retrieving data from the POST request and assigning it to variables. */
    $sessionid=$_POST['userid'];
    $firstname=$authInstance->validate($_POST['fname']);
    $lastname=$authInstance->validate($_POST['lname']);
    $username=$authInstance->validate($_POST['username']);
    $biotext=$authInstance->validate($_POST['textbio']);
    $email=$authInstance->validate($_POST['email']);
    $country=$authInstance->validate($_POST['country']);
    $interest=$authInstance->validate($_POST['interest']);
    $website=$authInstance->validate($_POST['editsite']);
    $altpics=$_POST['altpic'];
    $dp=$_FILES['dpic']["name"];


  //  $imagename=$_FILES['dpic'];
    $dp=$_FILES['dpic']["name"];
    $dpsize=$_FILES['dpic']['size'];
    $dptemp=$_FILES['dpic']['tmp_name'];

    //$dir="images/";
    $dir="../Images/signup_img/dp--";
    $dirfile=$dir.basename($dp);

    $_SESSION["lastactivity"]=time();  
    $_SESSION['lastactivetime']=date("h:ia");; 
    $_SESSION['lastactivedate']=date("y-m-d");              
    $_SESSION['datelastactivity']=date('y-m-d h:i:s');   
            $loginInstance->lastActivity($sessionid,$_SESSION["lastactivity"], $_SESSION['lastactivetime'], $_SESSION['lastactivedate'],$_SESSION['datelastactivity']);  
    

   /* The above code is performing form validation and updating a user's profile information. It checks
   if all the required fields (dp, firstname, lastname, username, biotext, email, country, and
   interest) are not empty. Then it checks if the input values for firstname, lastname, username,
   and biotext contain only letters and whitespaces. It also checks if the email address is valid
   and if the uploaded image file meets certain criteria (file extension and file size). */
    if(!empty($dp) && !empty($firstname) && !empty($lastname) && !empty($username) && !empty($biotext) && !empty($email) && !empty($country)&& !empty($interest)){
       /* The code block is performing a series of validations on the user input data before updating
       the user's profile. */
        if($authInstance->validLetters($firstname)){
            if($authInstance->validLetters($lastname)){
                if($authInstance->validLetters($username)){
                    if($authInstance->validLetters($biotext)){
                        if($authInstance->filteremail($email)){
                            if($imgInstance->imgextension($dp)){
                                if($imgInstance->largeImage($dpsize)){
                                    if($imgInstance->moveImage($dptemp, $dirfile)){
                                        if($userInstance->EditCheckusername($username,$sessionid)){
                                            if($userInstance->EditCheckEmail($email,$sessionid)){
                                                if($userInstance->updateProfile($dp, $firstname, $lastname, $username,$email, $biotext,$interest,$country,$website, $sessionid)){
                                                    echo "success";
                                                }else{
                                                   echo "an error occurred while updating your profile";
                                                }
                                            }else{
                                                echo 'email has already been used';
                                            }                                   
                                        }else{
                                            echo "username has been taken";
                                        }                              
                                    }else{
                                        echo "file failed to move";
                                    }
                                }else{
                                    echo "image must not be larger than 900kb";
                                }     
                            }else{
                            echo "dps";
                            }
                        }else{
                            echo "invalid email address";
                        }
                    }else{
                        echo "only letter and whitespaces are allowed in your bio";
                    }
                }else{
                    echo "only letter and whitespaces are allowed in your username";
                }
            }else{
                echo "only letter and whitespaces are allowed in your lastname";
            }
        }else{
            echo "only letter and whitespaces are allowed in your firstname";
        }
    }else{
         
    if(empty($dp) && !empty($firstname) && !empty($lastname) && !empty($username) && !empty($biotext) && !empty($email) && !empty($country)&& !empty($interest)){ 
        $dp=$altpics;
        if($authInstance->validLetters($firstname)){
            if($authInstance->validLetters($lastname)){
                if($authInstance->validLetters($username)){
                    if($authInstance->validLetters($biotext)){
                        if($authInstance->filteremail($email)){
                            if($imgInstance->imgextension($dp)){
                                if($imgInstance->largeImage($dpsize)){
                                    
                                        if($userInstance->EditCheckusername($username,$sessionid)){
                                            if($userInstance->EditCheckEmail($email,$sessionid)){
                                                if($userInstance->updateProfile($dp, $firstname, $lastname, $username,$email, $biotext,$interest,$country,$website, $sessionid)){
                                                    echo "success";
                                                }else{
                                                   echo "an error occurred while updating your profile";
                                                }
                                            }else{
                                                echo 'email has already been used';
                                            }                                   
                                        }else{
                                            echo "username has been taken";
                                        }                              
                                }else{
                                    echo "image must not be larger than 900kb";
                                }     
                            }else{
                            echo "file is not an image";
                            }
                        }else{
                            echo "invalid email address";
                        }
                    }else{
                        echo "only letter and whitespaces are allowed in your bio";
                    }
                }else{
                    echo "only letter and whitespaces are allowed in your username";
                }
            }else{
                echo "only letter and whitespaces are allowed in your lastname";
            }
        }else{
            echo "only letter and whitespaces are allowed in your firstname";
        }
    }else{
        echo "all fields are required to be filled";
    }
}

}


?>