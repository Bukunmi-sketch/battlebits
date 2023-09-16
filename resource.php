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

<head>
    <link rel="stylesheet" href="style.css">

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

            <div class="secondResourcesContent">
                <section class="secondResourcesMain">
                    <ul>
                        <li>
                            <span>Cereal</span>
                            <img src="images/Rectangle 241(1).png" />
                        </li>
                        <li> <span>Legumes</span>
                            <img src="images/Rectangle 241(1).png" />
                        </li>
                        <li> <span>Fruits</span>
                            <img src="images/Rectangle 241(1).png" />
                        </li>
                        <li> <span>Vegetables</span>
                            <img src="images/Rectangle 241(1).png" />
                        </li>
                        <li> <span>Daiary products</span>
                            <img src="images/Rectangle 241(1).png" />
                        </li>
                    </ul>

                </section>
                </section>

            </div>


            <div class="thirdContent">
                <div style="margin-bottom:-270px;"><input type="text" style="background:transparent;width:200px; padding:10px; color:white;" /></div>

                <h3 style="font-size:20px; font-weight:700; margin-top:80px;">Foods</h3>
                <img src="images/Frame 135.png">


                <div>
                    <button style="width:200px; background:#00440f; color:white; padding:10px; border:none; border-radius: 10px; height:50px; cursor:pointer;">Buy</button><br /><br />
                    <button style="width:200px; background:red; color:white; padding:10px; border:none; border-radius: 10px; height:50px; cursor: pointer;">Sell</button>
                </div>
            </div>

        </div>

    </div>



</body>

</html>