<?php

include '../Models/Users.php';
include '../Models/Register.php';
include '../Models/Auth.php';
include '../Models/Setting.php';


// create of object of the user classs
$authInstance = new Auth($conn);
$userInstance = new Users($conn);
$registerInstance = new Register($conn);
$settingInstance = new Settings($conn);


$settingInfo = $settingInstance->getsettinginfo();
$website_name = $settingInfo['website_name'];
$website_url = $settingInfo['website_url'];
$website_email = $settingInfo['website_email'];
$admin_mail = $settingInfo['admin_mail'];


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $text = '12123456789034123451123456789021234567890345612345678907890678905678901234567890';
    $text_suff = str_shuffle($text);
    $mailotp = substr($text_suff, 0, 6);

    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $userid = $_POST['userid'];


    if ($registerInstance->sendOtp($email, $mailotp)) {


        $data = [
            'email' => $email,
            'websiteurl'=>$website_url,
            'fullname' => $fullname,
            'username' => $username,
            'mailotp' => $mailotp,
            'from' => $website_name,
            'websiteemail' => $website_email,
    ];

        $to = "$email";
        $subject = "Security code to Verify Account";
        $message = "
        <div style='background: #E4E9F0'>
        <center><img src='$website_url/images/dashboard-logo.png' width='100px;'></center>
        <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
        <center><img src='$website_url/images/mail.png' width='100px'></center>
        <p>Hi <b>$fullname ($username)</b></p>
        <p>Welcome to $website_name</p>
        <p style='text-align: center; font-size: 25px;'><b>$mailotp</b></p>
        <p>Enter the Code above to verify your account</p>
        <p>Thanks</p>
        <p>Support Team, - $website_name</p>
        <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
        </div><br>
        </div>";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= "from: $website_name" . "\r\n";
        $headers .= "Reply-To: $website_email \r\n";
        $headers .= "Return-Path: $website_email\r\n";
        // $headers .= "CC: $website_email\r\n";
        $headers .= "BCC: $website_email\r\n";

        if (mail($to, $subject, $message, $headers)) {

            echo "success";
        }  

    //     $json = json_encode($data);
    //     //  $url='http://bucuzzi.dx.am/email/useremailapi.php';
    //     $url = 'https://bitexenus.com/useremailapi.php';
    //    // $url = 'https://bitexenus.com/responseapi.php';
    //     $ch = curl_init($url);

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Content-Length: ' . strlen($json)
    //     ));

    //     $response = curl_exec($ch);

    //     echo 'Error: ' . curl_error($ch);
    // } else {
    //     $decoded = json_decode($response, true);
    
    //     if ($decoded === null) {
    //         echo 'Error decoding JSON response';
    //     } else {
    //         // Check if the 'message' key exists in the response before accessing it
    //         if (isset($decoded['message'])) {
    //             echo $decoded['message'];
    //         } else {
    //             echo 'Unexpected response from the server';
    //         }
    //     }
    //     curl_close($ch);
    }
}
