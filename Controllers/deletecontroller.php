<?php
session_start();


include '../Models/Auth.php';
include '../Models/Users.php';
include '../Models/Feedback.php';


/* These lines of code are creating instances of the `Feedback`, `Auth`, and `Users` classes. The
`` variable is being passed as a parameter to these instances, which is likely a database
connection object. This allows the code to interact with the database using the methods and
properties defined in these classes. The `` variable is being initialized as an empty
string, but it is not being used in the provided code snippet. */
$feedInstance= new Feedback($conn);
$authInstance= new Auth($conn);
$userInstance= new Users($conn);
$password="";

/* This code block is checking if the HTTP request method is "POST". If it is, it retrieves the values
from the POST parameters `sessionid`, `firstname`, `lastname`, and `deletetext`. It then assigns
these values to variables ``, ``, ``, and `` respectively. */
if($_SERVER['REQUEST_METHOD']=="POST"){

$userid=$_POST['sessionid'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$delfeedback=$authInstance->validate($_POST['deletetext']);
$date=date("y-m-d");
$time=date('h:i:sa');
$location=$_SERVER['REMOTE_ADDR'];
//$sessionid=$_SESSION['id'];
    

      /* The code block is checking if the variable `` is not empty. If it is not empty, it
      calls the `deleteFeedback` method of the `` object, passing in the parameters
      ``, ``, ``, ``, ``, ``, and ``. */
        if(!empty($delfeedback)){
           /* The code block is checking if the `deleteFeedback` method of the `` object
           returns `true`. If it does, it executes a series of methods to delete various data
           associated with the user, such as posts, bookmarks, messages, notifications, comments,
           and the user account itself. Finally, it logs out the user and echoes "success" to
           indicate that the deletion process was successful. */
            if($feedInstance->deleteFeedback($delfeedback, $userid, $firstname, $lastname, $date, $time, $location)){          
               
                  $userInstance->deletePosts($userid);
                  $userInstance->deletePostCheck($userid);
                  $userInstance->deleteBookmarks($userid);
                  $userInstance->deleteFollow($userid);
                  $userInstance->deleteMessage($userid);
                  $userInstance->deleteNotification($userid);
                  $userInstance->deleteComments($userid);
                  $userInstance->deleteAccount($userid);
                  $authInstance->logout($userid);
                  echo "success";
             /*    if($userInstance->deleteAccount($sessionid)){
                    $authInstance->logout($sessionid);
                    echo "success";
                }
                */
            }else{
                echo 'an error occured while sending you this feedback';
            }
         }else{
           echo "tell us why you want to delete your account";
        }

   


               
           
}


?>