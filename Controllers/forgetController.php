<?php
    require '../Includes/db.inc.php';
    include '../Models/Auth.php';  
    include '../Models/Users.php';  
    include '../Models/Login.php';  
    include '../Models/Register.php';  
    include '../Models/Uploadimg.php';  
    include '../Models/Setting.php';
   
   
      // create of object of the user classs
    $authInstance= new Auth($conn);
    $userInstance= new Users($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
    $imgInstance= new Uploadimg($conn);
    $settingInstance = new Settings($conn);


$settingInfo = $settingInstance->getsettinginfo();
$website_name = $settingInfo['website_name'];
$website_url = $settingInfo['website_url'];
$website_email = $settingInfo['website_email'];
$admin_mail = $settingInfo['admin_mail'];
 
   


     
     $email='';
     $password='';
     $confirmpass="";
     $type="";
     $question="";
     $answer="";

    //  $website_url='www.bucuzzi.dx.am';
    //  $website_name='Bucuzzi';
    //  $website_email='Olarindebukunmi@gmail.com';


     $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
     $unique_id = '';
     for ($i=0; $i < 20; $i++) { 
         $index = rand(0, strlen($character) -1);
         $unique_id .=$character[$index];
     }
     $unique_id;

     $text = '12123456789034123451123456789021234567890345612345678907890678905678901234567890';
     $text_suff = str_shuffle($text);
     $mailotp = substr($text_suff, 0, 6);


    if($_SERVER['REQUEST_METHOD']=="POST"){

        $type=$_POST["action"];


        if($type=="email-verify"){
     
             $email=$authInstance->validate(ucfirst($_POST['email'] ?? ''));
          
             
             //for forget.php script
             if( !empty($email)){
               
                         if($authInstance->filteremail($email)){
                             //funtion to check if email has been used;
                               if(!$registerInstance->RegisterCheckemail($email)){
                                   if($registerInstance->sendOtp($email,$mailotp) ){
                                        if($data=$registerInstance->fetchRegisteredDetails($email)){
                                              //define session if login was succesful with returned user data
                                              session_start();
                                              $_SESSION['email']=$data['email'];
                                              $_SESSION['playername']=$data['playername'];
                                              $_SESSION['mailotp']=$mailotp;
                                              $_SESSION['id']=$data['id'];
                                              $_SESSION['email-check']=true;

                                              $playername= $_SESSION['playername'];
                                              $email= $_SESSION['email'];
                                         //     echo "success";     


                                    //           $data = [
                                    //             'email' => $email,
                                    //             'websiteurl'=>$website_url,
                                    //             'playername' => $playername,
                                    //             'username' => $username,
                                    //             'mailotp' => $mailotp,
                                    //             'from' => $website_name,
                                    //             'websiteemail' => $website_email,
                                    //     ];

                                    //     $json = json_encode($data);
                                    //   //  $url='http://bucuzzi.dx.am/email/useremailapi.php';
                                    //     $url='https://bitexenus.com/useremailapi.php';
                                    //   //  $url='https://bitexenus.com/responseapi.php';
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
                                    //            // echo 'Error decoding JSON response';
                                    //             echo $decoded;
                                    //         } else {
                                    //             echo $decoded['status'];
                                    //         }
                                    //         curl_close($ch);
                                    //     }
                                                    //  if($registerInstance->createResetPasswordNotification($_SESSION["id"],$_SESSION["id"],$type, $read_msg, $date, $time)){
                                                    //      echo "success";
                                                    //  }
                                                  
                                                  
                                                //   $to = "$email";
                                                //   $subject = "Security code to  Reset Password";
                                                //   $message = "
                                                //   <div style='background: #E4E9F0'>
                                                //   <center><img src='$website_url/images/dashboard-logo.png' width='100px;'></center>
                                                //   <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                                                //   <center><img src='$website_url/images/mail.png' width='100px'></center>
                                                //   <p>Hi <b>$playername $username</b></p>
                                                //   <p>Welcome to $website_name</p>
                                                //   <p style='text-align: center; font-size: 25px;'><b>$mailotp</b></p>
                                                //   <p>You requested to Reset Your Password , enter the code sent to you to continue, if this wasn't requested by you contact us </p>
                                                //   <p>Thanks</p>
                                                //   <p>Support Team, - $website_name</p>
                                                //   <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
                                                //   </div><br>
                                                //   </div>";
                                          
                                                //   // Always set content-type when sending HTML email
                                                //   $headers = "MIME-Version: 1.0" . "\r\n";
                                                //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                          
                                                //   // More headers
                                                //   $headers .= "from: $website_name" . "\r\n";
                                                //   $headers .= "Reply-To: $website_email \r\n";
                                                //   $headers .= "Return-Path: $website_email\r\n";
                                                //   // $headers .= "CC: $website_email\r\n";
                                                //   $headers .= "BCC: $website_email\r\n";
                                      
                                                //   if (mail($to,$subject,$message,$headers)){
                                                //             echo "success";
                                                //   }  else{
                                                //     echo "unable to send you an otp";
                                                //   }
                                         echo "success";
   
                                }else{
                                   echo "an error occured while fetching your details";
                               }
                            }else{
                                echo "problem sending otp";
                            }   
                            }else{
                            echo "oops! this email does not exist in our database";
                            }
                        }else{
                          echo "invalid email address";
                        }
                    }else{
                       echo "your email is required before you proceed";
                    }     
        }elseif($type=="verify_pin"){
          //for pin.php
       
              //   $question=$authInstance->validate(ucfirst($_POST['question'] ?? ''));
              $mailotp=$authInstance->validate(($_POST['mailotp'] ));
              $userid=$_POST["userid"];
    //          $reg_step= 3;
                  if(!empty($mailotp) ){  
                       if($registerInstance->verifyEmail($userid,$mailotp)){
                            session_start();
                            $_SESSION['pin']=true;
                            echo "success";
                       }else{
                           echo "wrong pin";
                       } 
              }else{
                  echo "please input the code sent to your email";
              }    
                       
    }elseif($type=="password-reset"){

       
        $password=$_POST['password'];
        $confirmpass=$_POST['confirmpassword'];
        $sessionid=$_POST["userid"];
        
        if(!empty($password) && !empty($confirmpass)){
            if($authInstance->passwordlength($password)){            
                if($authInstance->matchpassword($password, $confirmpass)){
                    if($userInstance->changepassword($sessionid, $password)){
                       // $_SESSION['security-check']=false;
                        echo "success";
                    }
                }else{
                  echo "password does not match";
                }
            }else{
                echo "password must not be less than 6";
            }
        }else{
            echo "kindly type your password";
        }
    
   
    }
    
}
