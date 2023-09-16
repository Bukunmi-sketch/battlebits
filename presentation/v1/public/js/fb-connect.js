var reason = null;
if(document.getElementById('reason')){
    reason = document.getElementById('reason').value;
}
var FACEBOOK_APP_ID = document.getElementById('FACEBOOK_APP_ID').value;
FB.init({
    appId:FACEBOOK_APP_ID,
    cookie: true,
    status:true, 
    xfbml: true,
    logging:false
});
if (reason=='logout'|| reason =='unverified')
{
    /*FB.getLoginStatus(function(response) {
        access_token = response.authResponse['accessToken'];
        window.location.href = "https://www.facebook.com/logout.php?next="+site_url+"&access_token="+access_token;
    });*/
}
else
{
    /*FB.getLoginStatus(function(response) {
        if (response.authResponse && response.authResponse['userID']) {
            var uid = response.authResponse['userID'];
            var param={
                uid: ""+uid+""
            };
            url = site_url+"scripts/ajax/check_fbuser.php";
            jQuery.post(url,param, function(return_data){
                if(return_data==1)
                {
                    window.location.href="index.php?file=u-fbsignup&ac="+response.authResponse['accessToken'];
                }
            });
        }
    
    });*/
}   

    function loginHandler(param_arg)
    { 
        FB.login(function(response) {
            if (response.authResponse && response.authResponse['userID']) {
                var uid = response.authResponse['userID'];
                var param={
                    uid: ""+uid+""
                };
                url = site_url+"scripts/ajax/check_fbuser.php";
                jQuery.post(url,param, function(return_data){
                    if(return_data==1)
                    {
                        window.location.href="index.php?file=u-fbsignup&ac="+response.authResponse['accessToken'];
                    }
                    else if(return_data==0){
                        if(param_arg==true)
                        {
                            window.location.href="index.php?file=u-fbsignup&ac="+response.authResponse['accessToken'];
                        }

                    }
                });
				
	  
            } else {
                // user cancelled login
            }
        },{scope:'email,user_birthday,user_photos,user_videos,publish_stream,create_event'});
    }

    //FB.Event.subscribe('auth.login', function(response) {
    //    if (response.authResponse && response.authResponse['userID']) {
    //        window.location.href="index.php?file=u-fbsignup&ac="+response.authResponse['accessToken'];
    //    // logged in and connected user, someone you know
    //    } else {
    //    //alert("logged out");
    //    // no user session available, someone you dont know
    //    }
    //
    ////window.location.href="index.php?file=u-fbsignup" 
    ////document.location.href = "fbsignup.php";
    //});	

