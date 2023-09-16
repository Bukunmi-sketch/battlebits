<?php
require '../Includes/db.inc.php';
include '../Models/Users.php';


$userInstance=new Users($conn);

if($_SERVER['REQUEST_METHOD']=="POST"){

 if($userInstance->getRandomUsers()){
    echo json_encode(["status"=>200, "message"=>"success", "playername"=>$userInstance->getRandomUsers() ]);
 }else{
    echo json_encode(["status"=>401, "message"=>"an error choosing random players"]);
 }
//echo "biscuits";
}
