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
        *,button,input[type='email'],a{
            font-family:'DM sans',serif;
        }
    </style>

    </head>

    <body style="font-family:'DM sans',sans-serif;">
        <div class="menuHeader">
        <?php include "./components/header.php"; ?>

        </div>




        <div>

            <div class="mainContent">
                <div class="firstContent">
                <?php include "./components/firstcontent.php"; ?>
                </div>

                <div class="secondAttackContent" style="padding: 0px;">

                    <section style="display:flex; align-items: center; justify-content: center; gap:30px; margin-top:150px;"><br/><br/><br/>
                        <main style="position: relative;">
                            <img src="images/Rectangle 248.png" style="position:absolute; top:10px; left:70px; right:0; width:50%; height:30px; z-index:1;"/>
                            <main style="position:absolute; z-index: 2; top:0; right:10px; left:30px;">
                                <h4 style="text-align:center; margin-top:70px; font-style: oblique; margin-bottom: 10px;">Free leaderboards</h4>

                                <main style="padding-right:10px; margin-left:-20px;">
                                    <ul style="display:flex; flex-direction: column; gap:5px;">
                                        <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                            <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:11px; height:11px; padding:3px; border-radius:50%; border:2px solid purple; display:flex; align-items: center; justify-content: center; justify-items: center; text-align:center; "><input type="radio" style="margin-left:3.7px; margin-bottom:2px;" /></section> <span>Bwoycoach</span></main>
                                            <main style="display:flex; flex-direction: column;">
                                                <span style="font-size:10px;">Level 9</span><span style="font-size:10px; color:orange;">$620</span>

                                            </main>
                                        </li>



                                        <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                            <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:2px solid purple; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;" /></section> <span>Casper01</span></main>
                                            <main style="display:flex; flex-direction: column;">
                                                <span style="font-size:10px;">Level 9</span><span style="font-size:10px; color:orange;">$540</span>

                                            </main>
                                        </li>

                                        <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                            <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:2px solid purple; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;"/></section> <span>Master_lee</span></main>
                                            <main style="display:flex; flex-direction: column;">
                                                <span style="font-size:10px;">Level 8</span><span style="font-size:10px; color:orange;">$500</span>

                                            </main>
                                        </li>

                                        <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                            <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:1px solid purple; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;" /></section> <span>Mystink$</span></main>
                                            <main style="display:flex; flex-direction: column;">
                                                <span style="font-size:10px;">Level 7</span><span style="font-size:10px; color:orange;">$463</span>

                                            </main>
                                        </li>

                                        <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                            <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:2px solid purple; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;"/></section> <span>Ayra_star</span></main>
                                            <main style="display:flex; flex-direction: column;">
                                                <span style="font-size:10px;">Level 7</span><span style="font-size:10px; color:orange;">$492</span>

                                            </main>
                                        </li>
                                    </ul>
                                    

                                </main>
                            </main>
                            <img src="images/Rectangle 245.png" style="width:300px; height: 390px;"/>

                        </main>
                        <main>
                            <main style="position: relative;">
                                <img src="images/Rectangle 249.png" style="position:absolute; top:0; left:80px; right:0; width:50%; height:30px; z-index:1;"/>
                                <main style="position:absolute; z-index: 2; top:0; right:10px; left:30px;">
                                    <h4 style="text-align:center; margin-top:70px; font-style: oblique; margin-bottom: 10px;">Paid leaderboards</h4>
    
                                    <main class="paidList" style="padding-right:10px; margin-left:-20px;">
                                        <ul style="display:flex; flex-direction: column; gap:5px;">
                                            <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                                <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:11px; height:11px; padding:3px; border-radius:50%; border:2px solid #FCA701; display:flex; align-items: center; justify-content: center; justify-items: center; text-align:center; "><input type="radio" style="margin-left:3.7px; margin-bottom:2px;" /></section> <span>Flexi$cool</span></main>
                                                <main style="display:flex; flex-direction: column;">
                                                    <span style="font-size:10px;">Level 10</span><span style="font-size:10px; color:orange;">$6620</span>
    
                                                </main>
                                            </li>
    
    
    
                                            <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                                <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:2px solid #FCA701; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;" /></section> <span>Coach_rexie</span></main>
                                                <main style="display:flex; flex-direction: column;">
                                                    <span style="font-size:10px;">Level 10</span><span style="font-size:10px; color:orange;">$6187</span>
    
                                                </main>
                                            </li>
    
                                            <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                                <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:2px solid #FCA701; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;"/></section> <span>Trapman</span></main>
                                                <main style="display:flex; flex-direction: column;">
                                                    <span style="font-size:10px;">Level 9</span><span style="font-size:10px; color:orange;">$5920</span>
    
                                                </main>
                                            </li>
    
                                            <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                                <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:1px solid #FCA701; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;" /></section> <span>Artynt...</span></main>
                                                <main style="display:flex; flex-direction: column;">
                                                    <span style="font-size:10px;">Level 9</span><span style="font-size:10px; color:orange;">$4810</span>
    
                                                </main>
                                            </li>
    
                                            <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                                <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:2px solid #FCA701; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;"/></section> <span>Simxtana69</span></main>
                                                <main style="display:flex; flex-direction: column;">
                                                    <span style="font-size:10px;">Level 9</span><span style="font-size:10px; color:orange;">$4730</span>
    
                                                </main>
                                            </li>


                                            <li style="list-style: none; display:flex; justify-content: space-between; align-items:center; padding:5px;">
                                                <main style="display:flex; gap:4px;"><section style="background-color: transparent; width:12px; height:12px; padding:3px; border-radius:50%; border:2px solid #FCA701; display:flex; align-items: center; justify-content: center; justify-items: center; "><input type="radio" style="margin-left:3px; margin-bottom:2px;"/></section> <span>Cityman</span></main>
                                                <main style="display:flex; flex-direction: column;">
                                                    <span style="font-size:10px;">Level 9</span><span style="font-size:10px; color:orange;">$3640</span>
    
                                                </main>
                                            </li>
                                        </ul>
                                        
                                    </main>
                                </main>
                            <img src="images/Rectangle 245.png" style="width:300px; height: 390px;"/>

                        </main>
                    </section>
                  
                 
                </div>


                <div class="thirdContent">
                    <div style="margin-bottom:0px;"><input type="text" style="background:transparent;width:200px; padding:10px; color:white; border:1px solid white;"/></div>

                  <img src="images/Rectangle 247.png" style="height:450px; width:250px; margin-top:-90px;"/>
                </div>

            </div>

        </div>



    </body>
</html>