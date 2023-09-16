<?php
session_start();
ob_start();

include './Includes/autoload.php';
include './private/redirect.php';

$sessionid = $_SESSION['id'];


/* The above code is retrieving user information from a user class using a session ID. It then
   assigns the retrieved user information to variables such as email, firstname, lastname,
   registered_date, and dp (profile image). */
$userInfo = $userInstance->getuserinfo($sessionid);
$email = $userInfo['email'];
$playername = $userInfo['playername'];
$registered_date = $userInfo['date'];


?>

<!DOCTYPE html>
<html>
<title>Explore</title>
<head>
    <link rel="stylesheet" href="style.css">
    <?php include "./Includes/metatags.php"; ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Resources/css/modal.css">
    <link rel="stylesheet" href="./Resources/css/form.css">

    <style>
        *,button,input[type='email'],a{
            font-family:'DM sans',serif;
        }
    </style>
</head>

<body>
    <div class="menuHeader">
        <?php include "./components/header.php"; ?>

    </div>




    <div>

        <div class="mainContent">
            <div class="firstContent">
                <?php include "./components/firstcontent.php"; ?>
            </div>

            <div class="secondExploitContent">



            </div>


            <div class="thirdContent">
                <div style="margin-bottom:-270px;"><input type="text" style="background:transparent;width:200px; padding:10px; color:white; border:1px solid white;" /></div>

                <img src="images/Rectangle 247.png" style="height:450px; width:250px; margin-top:-70px;" />
            </div>

        </div>

    </div>



</body>

</html>