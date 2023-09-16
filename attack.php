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
    <?php include "./Includes/metatags.php"; ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Resources/css/modal.css">
    <link rel="stylesheet" href="./Resources/css/form.css">


    <style>
        *,
        button,
        input[type='email'],
        a {
            font-family: 'DM sans', serif;
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
            <?php
            $statement = $userInstance->getRecentUsers();
            $recentData = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="secondAttackContent">
                <main class="secondAttackMain">
                    <ul>
                        <?php if ($statement->rowCount() > 0) : ?>
                            <li><span>Recent Players</span>
                            </li>
                            <?php foreach ($recentData as $recents) : ?>

                                <li style="height:50px;"> <span><?php echo $recents["playername"] ?></span>
                                    <img src="images/Rectangle 241(1).png" />
                                </li>

                            <?php endforeach ?>

                        <?php else : ?>
                            <h4>No players has Joined at the moment</h4>
                        <?php endif ?>
                    </ul>

                </main>

                <main style="position:absolute; right:0; top:10px; ">
                    <main style="background-image: url('images/Rectangle\ 244.png'); background-size: cover; background-repeat: no-repeat; padding:5px; width:300px; margin-bottom: 10px;">
                        <p style="margin: 5px; font-size: 16px;">Search Available Players</p>

                    </main>
                    <input type="text" class="search" style="width:400px; padding:5px; height:30px; border:2px solid black; border-radius: 10px;" /><br /><br />
                    <main style="margin-right: 30px;">
                        <form action="">
                            <button class="search-btn" style="background:#fca601;width: 200px; padding:10px; font-weight:800; font-size:16px;border:none; border-radius: 10px; height:45px; cursor:pointer;">Search</button>
                            <button id="btnrandom" style="background:#484846;width: 200px; padding:10px; font-weight:800; font-size:16px;border:none; border-radius: 10px; height:45px; color:white; cursor:pointer;">Automatch players</button>
                        </form>
                    </main>

                </main>

                <main class="secondAttackMain" style="margin:50px auto; position:absolute; right:50px; top:200px; ">
                    <!-- <form method="post" action="#">
                <div class="errror"></div> -->
                    <div class="feeds">

                    </div>
                    <!-- <div class="loading"></div>
                            <li><span>Recent Players</span></li>
                            <li class="feeds"></li> -->
                    <!-- </form> -->
                </main>





                <main id="myModal" style="display:none; background:rgba(0,0,0,0.7);width:500px;height:150px;  border-radius:20px; position:absolute; top:350px; left:100px;">
                    <p style="text-align:center;"><span class="playername"> Bwoycoach</span> has been Matched with you!</p>

                    <main style="display:flex; margin-top:30px; margin-left:140px;">
                    
                        <button style="width:200px; background:#fca601; color:white; padding:10px; border:none; border-radius: 0px; height:50px;cursor:pointer;">Play Now</button>
                    </main>

                </main>

            </div>


            <div class="thirdContent">
                <div style="margin-bottom:0px;">
                <form action="">
                  <input type="text" class="search" style="background:transparent;width:200px; padding:10px; color:white; border:1px solid white;"/></div>
                </form>
                  <img src=" images/Rectangle 247.png" style="height:450px; width:250px; margin-top:-90px;" />
                </div>

            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
        <script src="./Resources/js/random.js"></script>
        <script src="./Resources/js/search.js"></script>

</body>

</html>