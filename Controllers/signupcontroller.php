<?php

require '../Includes/db.inc.php';

include '../Models/Users.php';
include '../Models/Login.php';
include '../Models/Register.php';
include '../Models/Auth.php';
include '../Models/Uploadimg.php';
include '../Models/Setting.php';


// create of object of the user classs
$authInstance = new Auth($conn);
$userInstance = new Users($conn);
$loginInstance = new Login($conn);
$registerInstance = new Register($conn);
$imgInstance = new Uploadimg($conn);
$settingInstance = new Settings($conn);


$settingInfo = $settingInstance->getsettinginfo();
$website_name = $settingInfo['website_name'];
$website_url = $settingInfo['website_url'];
$website_email = $settingInfo['website_email'];
$admin_mail = $settingInfo['admin_mail'];


$user="";
$email = '';
$password = '';
$confirmpassword = "";
$type = "";
$question = "";
$answer = "";


if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $type = $_POST["action"];
    if ($type == "first_reg") {

        $user = $authInstance->validate(ucfirst($_POST['username']));
        $email = $authInstance->validate(ucfirst($_POST['email']));
        $password = strtolower($_POST['password']);
       // $confirmpassword = strtolower($_POST['confirmpassword']);
        $date = date('y-m-d');
        $type = "SIGNUP";
        $read_msg = "UNREAD";
        $time = date("h:i:sa");


        $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $unique_id = '';
        for ($i = 0; $i < 20; $i++) {
            $index = rand(0, strlen($character) - 1);
            $unique_id .= $character[$index];
        }
        $unique_id;

        $text = '12123456789034123451123456789021234567890345612345678907890678905678901234567890';
        $text_suff = str_shuffle($text);
        $mailotp = substr($text_suff, 0, 6);


        if (!empty($user) &&  !empty($email) && !empty($password)) { 
            if ($authInstance->validLetters($user) || $authInstance->validLetters($user)  ) {
               
                    //function to check invalid email
                    if ($authInstance->filteremail($email)) {
                        //funtion to check if email has been used;
                        if($registerInstance->RegisterCheckemail($email)) {
                             //funtion to check if email has been used;
                            if($registerInstance->RegisterCheckplayername($user)) {
                            //function to check if password is longer than 6
                            if ($authInstance->passwordlength($password)) {
                                //function to check if confirmpasswordword & password matches
                                // if ($authInstance->matchpassword($password, $confirmpassword)) {
                                    //function to register the user
                                    $reg_step = 2;
                                    if ($registerInstance->register($user, $email, $unique_id, $reg_step, $mailotp, $password, $date)) {


                                        if ($data = $registerInstance->fetchRegisteredDetails($email)) {
                                            //define session if login was succesful with returned user data
                                            session_start();
                                            $_SESSION['email'] = $data['email'];
                                            $_SESSION['playername'] = $data['playername'];
                                            $_SESSION['id'] = $data['id'];
                                            $_SESSION["lastactivity"] = time();
                                            $_SESSION['loggedin'] = true;
                                            $_SESSION['lastactivetime'] = date("h:i:sa");
                                            $_SESSION['lastactivedate'] = date("y-m-d");
                                            $_SESSION['datelastactivity'] = date('y-m-d h:i:s');
                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                            $browsertype = $_SERVER['HTTP_USER_AGENT'];


                                            //     $data = [
                                            //         'email' => $email,
                                            //         'websiteurl'=>$website_url,
                                            //         'fullname' => $fullname,
                                            //         'username' => $user,
                                            //         'mailotp' => $mailotp,
                                            //         'from' => $website_name,
                                            //         'websiteemail' => $website_email,
                                            // ];

                                        //     $json = json_encode($data);
                                        //  //   $url='http://bucuzzi.dx.am/email/useremailapi.php';
                                        //     $url='https://bitexenus.com/useremailapi.php';
                                        //     $ch = curl_init($url);

                                        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                                        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                                        //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                        //         'Content-Type: application/json',
                                        //         'Content-Length: ' . strlen($json)
                                        //     ));

                                        //     $response = curl_exec($ch);

                                        //     if (curl_errno($ch)) {
                                        //         echo 'Error: ' . curl_error($ch);
                                        //     } else {
                                        //         $decoded = json_decode($response, true);
                                            
                                        //         if ($decoded === null) {
                                        //             echo 'Error decoding JSON response';
                                        //         } else {
                                        //             // Check if the 'message' key exists in the response before accessing it
                                        //             if (isset($decoded['status'])) {
                                        //                 echo $decoded['status'];
                                        //             } else {
                                        //                 echo 'Unexpected response from the server';
                                        //             }
                                        //         }
                                        //         curl_close($ch);
                                        //     }
                                            // //  SEND EMAIL USERS
                                            // $to = "$email";
                                            // $subject = "Security code to Verify Account";
                                            // $message = "
                                            // <div style='background: #E4E9F0'>
                                            // <center><img src='$website_url/images/dashboard-logo.png' width='100px;'></center>
                                            // <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                                            // <center><img src='$website_url/images/mail.png' width='100px'></center>
                                            // <p>Hi <b>$fullname ($user)</b></p>
                                            // <p>Welcome to $website_name</p>
                                            // <p style='text-align: center; font-size: 25px;'><b>$mailotp</b></p>
                                            // <p>Enter the Code above to verify your account</p>
                                            // <p>Thanks</p>
                                            // <p>Support Team, - $website_name</p>
                                            // <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
                                            // </div><br>
                                            // </div>";

                                            // // Always set content-type when sending HTML email
                                            // $headers = "MIME-Version: 1.0" . "\r\n";
                                            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                            // // More headers
                                            // $headers .= "from: $website_name" . "\r\n";
                                            // $headers .= "Reply-To: $website_email \r\n";
                                            // $headers .= "Return-Path: $website_email\r\n";
                                            // // $headers .= "CC: $website_email\r\n";
                                            // $headers .= "BCC: $website_email\r\n";

                                            // if (mail($to, $subject, $message, $headers)) {

                                            //     echo "success";
                                            // }else{
                                            //     echo "unable to send email";
                                            // }  

                                           echo "success";
                                        
                                        } else {
                                            echo 'we could nt sign u in';
                                        }
                                    } else {
                                        echo "an error occurred while attempting to sign up";
                                    }
                                // } else {
                                //     echo "password does not match";
                                // }
                            } else {
                                echo "password is too short";
                            }
                        }else{
                            echo "oops,playername has been taken";
                        }
                        } else {
                            echo "oops this email has been used";
                        }
                    } else {
                        echo "invalid email address";
                    }
            } else {
                echo "Only letters and white space allowed in fullname and username";
            }
        } else {
            echo "all fields are required to be filled";
        }
    } elseif ($type == "second_reg") {


        //   $question=$authInstance->validate(ucfirst($_POST['question'] ?? ''));
        $mailotp = $authInstance->validate(($_POST['mailotp']));
        $userid = $_POST["userid"];
        $reg_step = 3;
        if (!empty($mailotp)) {
            if ($registerInstance->verifyEmail($userid, $mailotp)) {
                if ($registerInstance->updateRegStep($userid, $reg_step)) {
                    echo "success";
                } else {
                    echo "sorry,we could proceed you to the next step";
                }
            } else {
                echo "wrong pin";
            }
        } else {
            echo "please input the code sent to your email";
        }
    } 
   

}
