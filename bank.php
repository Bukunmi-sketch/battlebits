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

    <!-- --------------------------------BEGINNIG  OF MODAL ---------------------------------- -->
    <div class="modal" style=" display: none;">
        <div class="details-content">
            <div class="modal-header">
                <span>
                    <h4> Enter a Deposit </h4>
                </span>
                <span class="close">&times</span>
            </div>
            <div class="min-sub-container">
                <form class="create" action="#" enctype="multipart/form-data">
                    <div class="error"></div>


                    <div class="inputbox-details">
                        <!-- <select name="category">
                            <option value="spaceship">spaceship</option>
                            <option value="war plane">war plane</option>
                            <option value="Ammunitions">Ammunitions</option>
                            <option value="Tanks">Tanks</option>
                            <option value="Foods">Foods</option>
                        </select> -->
                        <input type="number" name="depositamount" id="depositfield" placeholder="Enter a deposit" value="<?php echo $deposit; ?> " autofocus>
                    </div>

                    <div class="button-details">
                        <input type="hidden" name="depositor_id" value="<?php echo $sessionid; ?> " autofocus>
                        <input type="hidden" name="type" value="deposit" autofocus>
                        <button class="submit" name="login">Deposit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------END OF MODAL ---------------------------------- -->

    <div>

        <div class="mainContent">
            <div class="firstContent">
                <?php include "./components/firstcontent.php"; ?>
            </div>

            <div class="secondBankContent">

            </div>
            <?php
            $stmt = $transactionInstance->totalDeposit($sessionid);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $amount = $data["amount"];
            $amount == null || "" ? $amount = "0.00" : $amount;


            $statement = $transactionInstance->getLastTransactionHistory($sessionid);
            $transactionData = $statement->fetchAll(PDO::FETCH_ASSOC);

            ?>



            <div class="thirdContent">
                <div style="margin-top:0px;"><input type="text" style="background:transparent;width:200px; padding:10px; color:white; border:1px solid white;" /></div>
                <h3 style="margin-top:0px;">Bank Balance</h3>
                <h6 style="font-size:15px; font-weight:700; margin-top:-40px;">$<?php echo number_format($amount, 2); ?></h6>
                <p style="text-align:left; font-size:14px;margin-bottom: -20px; margin-left: -80px; margin-top:-50px;">Transactions history</p>
                <section style="background:white; width:230px; height:350px; color: black;" class="transactionList">
                    <?php if ($statement->rowCount() > 0) : ?>

                        <?php foreach ($transactionData as $transactions) : ?>
                            <main style="display:flex; align-items: center; justify-content:space-around; justify-items: center; padding: 1px; border-bottom: 1px solid rgb(104, 103, 103);">
                                <img src="images/image 414.png" style="width:22px;height:22px;" />
                                <main style="color:black; margin-left: -20px;">
                                    <p style="font-size:15px;"> <?php echo $transactions["type"] ?></p>
                                    <!-- <p style="margin-top:-18px; font-size:12px;">#104567</p> -->
                                </main>
                                <main class="price">
                                    <span style="font-size:13px; font-weight:800;">$<?php echo number_format($transactions["amount"], 2);  ?></span>

                                </main>
                            </main>
                        <?php endforeach ?>

                    <?php else : ?>
                        <h4>You haven't made any transaction at the moment</h4>
                    <?php endif ?>

                </section>

                <div>

                    <button class="depositt" style="width:200px; background:#00440f; color:white; padding:10px; border:none; border-radius: 10px; height:50px;">Deposit</button><br /><br />
                    <button style="width:200px; background:#fca601; color:white; padding:10px; border:none; border-radius: 10px; height:50px;">Withdraw</button>
                </div>
            </div>



        </div>

    </div>

    </div>
    <script>
        const depositfield = document.querySelector("#depositfield");
        depositfield.onkeyup = () => {
            let deposivalue = depositfield.value;

            if(deposivalue >= 1000000){
                depositfield.value="";
                Swal.fire({
                    icon: 'error',
                    title: 'Unaccepted!',
                    text: 'deposit fee cannot be larger than $1,000,000',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
                
            }else{
              //  deposivalue-deposivalue;
            }
        } //onkeyup
    </script>
    <script src="./Resources/js/modal.js"></script>
    <script src="./Resources/js/deposit.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>

</body>

</html>