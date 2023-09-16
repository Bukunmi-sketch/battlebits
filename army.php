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
<title>Army</title>
<head>
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

            <div class="secondContent">
                <section class="secondMain">
                    <h5>UNIT STAT</h5> <br />
                    <section class="statlist">
                        <ul>
                            <li><span>15</span> <span>TANKS</span></li><br />
                            <li><span>9</span> <span>SHIPS</span></li><br />
                            <li><span>9</span> <span>WARPLANE</span></li><br />

                            <li><span>13</span> <span>INFANTRY</span></li>


                        </ul>
                    </section>
                </section>
            </div>


            <div class="thirdContent">
                <img src="images/Group 31.png" />
                <img src="images/Group 32.png" />
            </div>

        </div>

    </div>



</body>

</html>