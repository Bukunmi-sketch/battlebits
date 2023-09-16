<?php
require '../Includes/db.inc.php';
include '../Models/Transaction.php';
include '../Models/Auth.php';


$transactionInstance=new Transaction($conn);
$authInstance=new Auth($conn);

$depositamount="";
$type="";
$depositor_id="";
$date="";


if($_SERVER['REQUEST_METHOD']=="POST"){


    $depositamount=$authInstance->validate($_POST['depositamount']);
    $type=$_POST['type'];
    $date=date("y-m-d h:ia");
    $depositor_id=$_POST['depositor_id'];
 

    if(!empty($depositamount)){
                if($transactionInstance->createTransaction($depositor_id, $depositamount, $type, $date ) ){
                   echo "success";
                }else{
                  echo "an error occurred while depositing funds";
                }    
     }else{
      echo "enter deposit amount";
     }






}
