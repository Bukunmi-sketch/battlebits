<?php
require '../Includes/db.inc.php';
include '../Models/Shop.php';
include '../Models/Auth.php';


$shopInstance=new Shop($conn);
$authInstance=new Auth($conn);

$weapons="";
$type="";
$depositor_id="";
$date="";


if($_SERVER['REQUEST_METHOD']=="POST"){

    if (isset($_POST['weapons']) && is_array($_POST['weapons'])) {
        $weapons =$_POST['weapons']; // Assuming 'weapons' is an array
        $type = $_POST['type'];
        $date = date("y-m-d h:ia");
        $buyer_id = $_POST['buyer_id'];
        $amount="";
        
    
        if (!empty($weapons)) {
           // foreach ($weapons as $weapon) {
                if ($shopInstance->buyWeapon($buyer_id,  $amount, $weapons, $date)) {
                    echo "success";
                } else {
                    echo "an error occurred while depositing funds";
                }
     //       }
        } else {
            echo "select a weapon";
        }
    } else {
        echo "pls,select a weapon to continue"; // Handle the case where 'weapons' is not set or not an array
    }






}
