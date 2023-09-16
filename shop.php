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

<body style="font-family:'DM sans',sans-serif;">
    <div class="menuHeader">
        <?php include "./components/header.php"; ?>

    </div>



    <form action="">

    <div>

        <div class="mainContent">
            
            <div class="firstContent">
                <?php include "./components/firstcontent.php"; ?>
            </div>

           
            <div class="secondShopContent">
                <button style="background:#ff7a00; color:white; width:200px; padding:10px; font-size: 25px; border:none;outline:none;border-bottom-right-radius: 20px; box-shadow:1px 1px 1px 3px rgba(0,0,0,0.8); margin-left:50px; margin-top:50px;">Shop</button>

                <br /><br />
                <div style="height:400px; width:530px; background:rgba(0,0,0,0.8); margin-left:50px; border-radius: 30px; padding:6px;">
                    <h2 style="text-align: center; color:#ff7a00;">ITEM TO PURCHASE</h2>
                    <div class="error"></div>
                    <main>
                        <ul>
                            <li style="list-style: none; display:flex; align-items: center;gap:20px;">
                                <input type="checkbox" name="weapons[]" value="Spaceship" style="width:30px; height:20px; background:black;" />
                                <span style="font-size:20px; font-weight:800;">Spaceship</span>
                            </li><br /><br />
                            <li style="list-style: none; display:flex; align-items: center;gap:20px;">
                                <input type="checkbox" name="weapons[]" value="War Plane" style="width:30px; height:20px; background:black;" />
                                <span style="font-size:20px; font-weight:800;">War Plane</span>
                            </li><br /><br />
                            <li style="list-style: none; display:flex; align-items: center;gap:20px;">
                                <input type="checkbox" name="weapons[]" value="Ammunitions" style="width:30px; height:20px; background:black;" />
                                <span style="font-size:20px; font-weight:800;">Ammunitions</span>
                            </li><br /><br />
                            <li style="list-style: none; display:flex; align-items: center;gap:20px;">
                                <input type="checkbox" name="weapons[]" value="Tanks" style="width:30px; height:20px; background:black;" />
                                <span style="font-size:20px; font-weight:800;">Tanks</span>
                            </li><br /><br />
                            <li style="list-style: none; display:flex; align-items: center;gap:20px;">
                                <input type="checkbox" name="weapons[]" value="Foods" style="width:30px; height:20px; background:black;" />
                                <span style="font-size:20px; font-weight:800;">Foods</span>
                            </li>
                        </ul>
                    </main>

                </div>
               
                <main style="margin-left:50px;"><br />
                    <button id="buywithwars" style="background:rgba(0,0,0,0.9);color:white; padding:10px; width:180px; border-top: none; border-right: none; border-radius:10px; border-bottom:2px solid #ff7a00; border-left:2px solid #ff7a00;">Buy with WARS</button>
                    <button id="buywithbalance" style="background:rgba(0,0,0,0.9);color:white; padding:10px; width:180px; border-top: none; border-right: none; border-radius:10px; border-bottom:2px solid #ff7a00; border-left:2px solid #ff7a00;">Buy with Balance</button>
                    <input type="hidden" name="buyer_id" value="<?php echo $sessionid; ?> " autofocus>
                    <input type="hidden" name="type" value="deposit" autofocus>
                </main>
            </div>
           
            


            <div class="thirdContent">
                <div style="margin-bottom:-270px;"><input type="text" style="background:transparent;width:200px; padding:10px; color:white; border:1px solid white;" /></div>

                <img src="images/Rectangle 247.png" style="height:450px; width:250px; margin-top:-70px;" />
            </div>

        </div>

    </div>
    </form>
    <script src="./Resources/js/weapon.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>

</body>

</html>