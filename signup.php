<!DOCTYPE html>
<html>
<title>Register</title>
<head>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.cs" />
    <link rel="stylesheet" href="media.css" />
    <?php include './Includes/metatags.php'; ?>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas Neue">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hind">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
</head>

<body>
    <div class="newlog">
        <div class="login_container">
            <div class="login-box">
                <div class="form-hdr">
                    <h3>CREATE YOUR ACCOUNT</h3>
                </div>
                <!-- <div class="form-social-btns">
                    <input type="hidden" name="reason" id="reason" value="">
                    <input type="hidden" name="FACEBOOK_APP_ID" id="FACEBOOK_APP_ID" value="169599589745368">
                    <div id="fb-root"></div>
                    <script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
                    <script type="text/javascript" language="JavaScript" src="https://www.themafiaboss.com/presentation/v1/public/js/fb-connect.js"></script>
                    <span><button class="social_btn" id="facebook" onclick="loginHandler(true);" rel="external" tabindex="1"><img src="presentation/v1/images/fb-login-btn.png" alt="Mafia Boss"></button></span>
                    <span><button class="social_btn" type="button" id="google"><img src="presentation/v1/images/google-login-btn.png" alt="Mafia Boss"></button></span>
                </div> -->

                <div class="form-subhdr">
                    <div class="dontaccount">ALREADY CREATED AN ACCOUNT? <br>
                        <a href="login">CLICK HERE TO LOGIN</a>
                    </div>
                </div>

                <div id="signup-body" class="">
                    <div class=""></div>

                    <!--DISPLAY SUCCESSFULLY REGISTRATION MESSAGE-->
                    <div class="signup-form s_form">
                        <form id="frmsignup" method="post">
                          
                        <div class="error" style="color:red"></div>

                            <div id="login-info" class="main-login-info-part">
                                <div class="">

                                    <div class="clearfix"></div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="" class="control-label">Email Address</label>

                                                <input type="email" name="email" class="form-control" id="email" maxlength="100" value="" autocomplete="off">

                                                <span class="tooltip help-ico"><i class="fa fa-exclamation-circle"></i>
                                                    <span class="tooltiptext">activation e-mail will be sent here </span>
                                                </span>
                                                <span class="help-block h_block">activation e-mail will be sent here</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-group-lg">
                                                <label for="" class="control-label">Player Name</label>
                                                <input type="text" id="username" class="form-control" name="username" maxlength="18" value="" autocomplete="off">
                                                <span class="tooltip help-ico"><i class="fa fa-exclamation-circle"></i>
                                                    <span class="tooltiptext">3-18 length, a-Z 0-9 Charactors. </span>
                                                </span>
                                                <span class="help-block h_block">3-18 length, a-Z 0-9 Charactors.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-group-lg">
                                                <label for="" class="control-label">Password</label>
                                                <input type="password" id="password" name="password" maxlength="12" class="form-control" value="" autocomplete="off">
                                                <span class="tooltip help-ico"><i class="fa fa-exclamation-circle"></i>
                                                    <span class="tooltiptext">3-12 length, a-Z 0-9 Charactors.</span></span>
                                                <span class="help-block h_block">3-12 length, a-Z 0-9 Charactors.</span>
                                            </div>
                                        </div>

                                        <!--<div class="col-md-6">
                                                                        <div class="form-group form-group-lg">
                                                                            <label for="" class="control-label">Choose Player Name</label>
                                                                            <input type="text" name="alias" class="form-control  personal" id="alias" maxlength="25" value="" />
                                                                            <span class="tooltip help-ico"><i class="fa fa-exclamation-circle"></i>
                                                                                <span class="tooltiptext">mafioso name would be your nickname in the game</span></span> 
                                                                            <span class="help-block h_block">mafioso name would be your nickname in the game</span> </div>
                                                                    </div>

                                                                    -->
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <div class="login-agree custom-chkbx">
                                            <label class="container">I agree to the <a href="terms.html">Terms of Service</a> & <a href="datapolicy.html"> Data Privacy Policy </a>
                                                <input name="agree" id="agree" type="checkbox" value="">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <!-- <div class="col text-center btn-row">
                                            <div class="captcha-sect">
                                                <div class="form-group form-group-lg">

                                                    <div class="g-recaptcha" data-sitekey="6Ld5NIMUAAAAABBvD1g4eyw9Db5pr518YGx5wgK3" style="transform:scale(0.95);-webkit-transform:scale(0.95);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>

                                                </div>
                                            </div>

                                        </div> -->
                                        <!--<div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group form-group-lg">
                                                                            <input type="checkbox" checked="true" name="getemails" value="Yes" class="terms2   personal" />
                                                                            <label for="" class="control-label">Subscribe to newsletter</label>
                                                                        </div>
                                                                        <div class="form-group form-group-lg">

                                                                            <input type="checkbox" name="agree" id="agree" class=" personal" value="yes" >
                                                                            <input type="hidden" name="step1" value="1">
                                                                            <label for="" class="control-label">
                                                                I have read, and agree to abide by the  <a href="javascript:void(0)" onclick="window.open('https://www.themafiaboss.com/terms.html?terms_top=no','Make payments with Zong mobile - it is fast, free and secure!','location=1,status=1,scrollbars=0, width=600,height=555 left=350 top=60')" class="boxlink">Terms of Service.</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        <div class="col text-center btn-row">
                                            <div id="signup-btn" class="signup-btn">
                                            <input type="hidden" name="action" value="first_reg">

                                                <button type="submit" id="button" class="cmn-btn cmn-btn-lg cmn-hvr signup_btn">CREATE ACCOUNT</button>
                                            </div>
                                        </div>

                                        <!--<div id="signup-btn" class="signup-btn sign_btn">
                                                                    <input type="hidden" name="signup_action" value="signup_action">
                                                                    
                                                                    <button type="submit"><span>Signup</span><span>Join and play for free</span></button>
                                                                </div> 


                                                                <div class="signup-btn sign_btn txt_div">
                                                                    By clicking on "Sign up", you accept the <a href="javascript:void(0)" onclick="window.open('https://www.themafiaboss.com/terms.html?terms_top=no', 'Make payments with Zong mobile - it is fast, free and secure!', 'location=1,status=1,scrollbars=0, width=600,height=555 left=350 top=60')" class="boxlink">Terms of Service.</a>
                                                                    and declare that you are over 18 years old
                                                                </div>-->

                                        <div class="form-subhdr ">
                                            <div class="dontaccount">ALREADY CREATED AN ACCOUNT? <br>
                                                <a href="login">CLICK HERE TO LOGIN</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </form>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    </div>
    <script src="./Resources/js/signup.js"></script>
    <!-- Footer Section -->



    <style>
        * {
            margin: 0;
            scroll-behavior: smooth;
        }

        *,button,input[type='email'],a{
            font-family:'DM sans',serif;
        }

        /* h1 {
            /* font-family: 'bebasBebas Neue'; 
        } */

        /* Login */
        .newlog {
            background-image: url("presentation/v1/images/grad_bg.webp");
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            width: 100%;
            display: block;
            height: cover;
            justify-content: center;
            align-items: center;
        }

        .login_container {
            position: relative;
            background-color: rgba(0, 0, 0, 0.178);
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .login-box {
            position: relative;
            align-items: center;
            justify-content: center;
            padding-top: 180px;
        }

        .login-form {
            position: relative;
        }


        /* login form **/
        .login-box {
            width: 540px;
            margin: auto;
            display: block;
            position: relative;
        }

        .form-hdr {
            display: block;
            width: 100%;
            text-align: center;
            position: relative;
            margin-bottom: 30px;
        }

        .form-hdr h3 {
            font-size: 40px;
            line-height: 50px;
            color: #fff;
            /* font-family: 'Hind'; */
            text-transform: uppercase;
            box-shadow: 0 0 5px rgba(0, 0, 0, .3);
        }

        .form-social-btns {
            display: flex;
            text-align: center;
            margin: 0 0 10px;
            gap: 7px;
        }

        .form-social-btns a {
            display: inline-block;
            margin: 0 0 10px 0;
        }

        .form-social-btns span {
            display: block;
        }

        .form-subhdr {
            display: block;
            text-align: center;
            width: 100%;
            padding-top: 40px;
        }

        .form-subhdr h4 {
            color: #fff;
            text-transform: uppercase;
            /* font-family: 'Bebas Neue'; */
            font-size: 26px;
            line-height: 36px;
            padding-top: 10px;
        }

        .form-row {
            margin: 0 -15px;
        }

        .form-row>.col,
        .form-row>[class*=col-] {
            padding: 0 15px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group input {
            border-radius: 5px;
        }

        .form-group label {
            font-size: 18px;
            color: #fff;
            margin-bottom: 4px;
        }

        .login-btn {
            width: 100%;
            line-height: 55px;
            font-size: 32px;
            min-width: inherit;
        }

        .form-control {
            border: none;
            border-radius: 0;
            height: 55px;
            width: 100%;
            font-size: 18px;
            color: #000;
            padding: 0 15px;
        }

        .form-control:focus {
            outline: none;
        }

        .btn-row {
            margin-top: 10px;
        }

        .form-social-btns img {
            border-radius: 4px;
        }

        .signup_btn {
            height: 60px;
            font-size: 20px;
            padding-left: 120px;
            padding-right: 120px;
            color: #ffd900;
            background-color: #1d1d1d;
            border: none;
            border-radius: 5px;
        }

        /* login form **/

        #middle.login {
            padding-top: 200px;
        }

        .logo-img {
            width: 290px;
            float: left;
        }

        .logo-cnt {
            width: 475px;
            float: left;
        }

        .playnow-btn {
            margin-left: 110px;
            margin-top: 50px;
        }

        h2.title-big-font {
            font-size: 50px;
        }

        .home-slider-row .owl-carousel .owl-stage-outer {
            height: 250px;
        }

        img.vidoo-play-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            right: 0;
            margin: auto;
            object-fit: none;
            width: auto !important;
            height: auto !important;
        }

        .login-agree {
            font-size: 18px;
            text-align: center;
            color: #999;
            line-height: 30px;
        }

        .login-agree a {
            text-decoration: none;
            color: #fff;
        }

        .login-agree a:hover {
            text-decoration: none;
        }

        .robot-captcha {
            text-align: center;
            margin: 5px 0 15px 0;
        }

        .robot-captcha img {
            max-width: 100%;
        }

        .dontaccount {
            text-transform: uppercase;
            font-size: 15px;
            color: #999;
            /* font-family: 'Hind'; */
        }

        .dontaccount a {
            color: #fff;
            text-decoration: none;
            font-size: 23px;
            /* font-family: 'Hind'; */
        }

        .dontaccount a:hover {
            text-decoration: none;
        }

        .cant-access a {
            color: #fff;
            text-decoration: none;
            font-size: 23px;
            text-transform: uppercase;
        }

        .cant-access a:hover {
            text-decoration: none;
        }

        .g-recaptcha>div {
            margin: auto;
        }


        /* The container */
        .custom-chkbx .container {
            display: inline;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 15px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .custom-chkbx .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .custom-chkbx .checkmark {
            position: absolute;
            top: -4px;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: transparent;
            border: 1px solid #999999;
        }

        /* On mouse-over, add a grey background color */
        .custom-chkbx .container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .custom-chkbx .container input:checked~.checkmark {
            background-color: #ffffff;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .custom-chkbx .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .custom-chkbx .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .custom-chkbx .container .checkmark:after {
            left: 9px;
            top: 7px;
            width: 5px;
            height: 10px;
            border: solid #000000;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .google-play-img {
            text-align: right;
            margin-top: 10px;
        }

        .google-play-img img {
            width: 180px;
        }





        /* Heading */
        .heading h1 {
            color: #FF9900;
            /* font-family: 'Bebas Neue'; */
            font-size: 90px;
            font-weight: 500;
        }

        .heading p {
            color: white;
            /* font-family: 'Hind', sans-serif; */
            padding-top: 20px;
            text-align: center;
            width: 100%;
        }

        .mechanics {
            display: block;
            width: 100%;
            overflow: hidden;
            padding-top: 100px;
            align-items: center;
            justify-content: center;
        }

        .mechanics_container {
            display: flex;
            align-items: center;
            align-self: center;
            align-content: center;
            width: 100%;
        }

        .wrapper {
            color: white;
            display: block;
            width: 100%;
        }


        .wrapper h2 {
            /* font-family: 'Bebas Neue'; */
            font-size: 64px;
            font-weight: 200;
        }

        .wrapper p {
            width: 100%;
            /* font-family: 'Hind', sans-serif; */
        }

        .wrapper_img {
            display: block;
            width: 100%;
        }

        .wrapper_img img {
            width: 400px;
            height: 480px;
            /* font-family: 'Hind'; */
            padding-left: 80px;
        }



        /* Testimonials */

        .testimonial {
            background: #fff;
            width: 100%;
        }

        .testimonial .container {
            background: #fff;
        }

        .testimonial .container .heading p {
            color: black;
        }

        .banner {
            width: 100%;
            margin: 0;
            background: #131313;
        }

        .banner_img img {
            width: 100%;
            margin: 0;
        }

        footer {
            background: #131313;
            padding: 90px;
            margin: 0;
        }

        .footer_container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            background: #131313;
        }

        .footer_menu {
            display: flex;
            padding-right: 90px;
            text-decoration: none;
        }

        .footer_links {
            list-style: none;
            color: #BFBFBF;
            /* font-family: 'Inter', sans-serif; */
            font-weight: lighter;
            line-height: 30px;
            text-decoration: none;
        }

        .footer_links a {
            text-decoration: none;
            color: #BFBFBF;
            width: 100%;
        }

        .footer_links1 {
            /* font-family: 'Inter', sans-serif; */
            font-size: 20px;
            line-height: 50px;
            font-weight: bold;
            list-style: none;
            color: white;
        }

        .links {
            padding-left: 90px;
        }


        .socials {
            display: flex;
        }

        .socials img {
            border-radius: 15px;
            justify-content: space-between;
            width: 40px;
            height: 40px;
        }
    </style>

</body>

<footer>
    <div class="footer_container">
        <div class="footer_logo">
            <img src="/presentation/v1/images/logo.png" alt="" width="200px">
        </div>

        <div class="footer_menu">
            <div class="menu">
                <ul>
                    <li class="footer_links1">Menu</li>
                    <li class="footer_links"><a href="index">Home</a></li>
                    <li class="footer_links"><a href="">Our Service</a></li>
                    <li class="footer_links"><a href="">About Us</a></li>
                    <li class="footer_links"><a href="">Contact Us</a></li>
                </ul>
            </div>

            <div class="links">
                <ul>
                    <li class="footer_links1">Links</li>
                    <li class="footer_links"><a href="">FAQ's</a></li>
                    <li class="footer_links"><a href="">Terms of Service</a></li>
                    <li class="footer_links"><a href="">Privacy Policy</a></li>
                    <li class="footer_links"><a href="">Live Support</a></li>
                </ul>
            </div>

            <div class="contact">
                <ul>
                    <li class="footer_links1">Reach Out</li>
                    <li class="footer_links">
                        <div class="socials">
                            <img src="/presentation/v1/images/fb.svg" alt="facebook">
                            <img src="/presentation/v1/images/li.svg" alt="linkedin">
                            <img src="/presentation/v1/images/tw.svg" alt="twitter">
                            <img src="/presentation/v1/images/yout.svg" alt="youtube">
                        </div>
                    </li>
                    <li class="footer_links" style="padding-top: 12px;"><a href="">hello@warlords.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</html>