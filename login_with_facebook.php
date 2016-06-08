<?php
//http://webformyself.com/avtorizaciya-cherez-socialnye-seti-facebook/
//http://webformyself.com/avtorizaciya-cherez-socialnye-seti-vkontakte/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Facebook Login</title>
    <meta charset="UTF-8">

    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/font-awesome.css" rel="stylesheet"> <!-- подключ.css-файл font-awesome со шрифт.иконками-->
    <link href="assets/css/style.css" rel="stylesheet" media="screen">

    <script src="assets/js/jquery-2.2.3.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
</head>
<body>


<script>
/** (https://developers.facebook.com/docs/facebook-login/web)
 * Facebook SDK for JavaScript. Implementation of the "Sign in with Facebook» for web applications using JavaScript SDK
*/
    // This is called with the results from FB.getLoginStatus() from function checkLoginState()
    function statusChangeCallback(response) {
        /*add me*/ var addToMessageByStatus = 'to login this site';
        console.log('statusChangeCallback');
        console.log(response);  //get a response from the Facebook

    /**_______________________________________________added me */
    /** If response.status is not 'connected' and we location not page is 'login_with_facebook.php' -> redirect to login_with_facebook.php */
    if (response.status === 'unknown' || response.status === 'not_authorized'){
            if( location.pathname === '/' && location.search == '?login=true' ){
               location.href="http://message.wall.loc/login_with_facebook.php";
            }
        }
    /**_______________________________________________/added me */

         /*The response object is returned with a status field that lets the app know the current login status of the person.
         Full docs on the response object can be found in the documentation for FB.getLoginStatus().*/
        if (response.status === 'connected') {  //Logged into your app and Facebook.
           //testAPI();
            basicAPIRequest();
            console.log('my---->> ' + response.status);

            /**_______________________________________________added me */
            /** If success Login in -> Redirect to Home Page(message.wall.loc) */
            document.getElementById('waiting').innerHTML = 'Waiting please... <i class="fa fa-refresh fa-spin"></i>';

            setTimeout(function() {
                window.location.href = "http://message.wall.loc?login=true";
            }, 3000);
            /**_______________________________________________/added me */

        } else if (response.status === 'not_authorized') {  //The person is logged into Facebook, but not your app
            document.getElementById('status').innerHTML = '<span class="text-danger">Please log ' + 'into this app ' +addToMessageByStatus+'</span>';
            //console.log('my---->> ' + response.status);
            /**_______________________________________________added me */
            /** Delete all cookies from this App & if we location on index.php -> redurect to login_with_facebook.php*/
            var date = new Date(0);
            document.cookie='user_id_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_name_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_gender_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_email_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_avatar_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_link_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='fbsr_771833962953642=; path=/; expires=' + date.toUTCString();

            //if( location.pathname === '/' ){ window.location.href = "http://wmessage.wall.loc/login_with_facebook.php"; }
            /**_______________________________________________/added me */
        } else {  //The person is not logged into Facebook, so we're not sure if they are logged into this app or not
            if( window.location.pathname == '/login_with_facebook.php'){
                document.getElementById('status').innerHTML = '<span class="text-danger">Please log ' + 'into Facebook ' +addToMessageByStatus+'</span>';
            }

            //console.log('my---->> ' + response.status);
            /**_______________________________________________added me */
            /** Delete all cookies from this App & if we location on index.php -> redurect to login_with_facebook.php*/
            var date = new Date(0);
            document.cookie='user_id_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_name_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_gender_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_email_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_avatar_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='user_link_in_fb=; path=/; expires=' + date.toUTCString();
            document.cookie='fbsr_771833962953642=; path=/; expires=' + date.toUTCString();

           // if( location.pathname === '/' ){ window.location.href = "http://wmessage.wall.loc/login_with_facebook.php"; }
            /**_______________________________________________/added me */
        }
    }

    /* This function is called when someone finishes with the Login Button.
     See the onlogin handler attached to it in the samplecode below */
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '771833962953642',  //identificator App
            cookie     : true,  //enable cookies to allow the server to access
                                //the session
            xfbml      : true,  //parse social plugins on this page
            version    : 'v2.6' //use version (version: v2.6)
        });

        // Now that we've initialized the JavaScript SDK, we call FB.getLoginStatus().
        // This function gets the state of the person visiting this page and can return one of three states to the callback you provide.
        // They can be:
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    //Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //Test of the Graph API after login is successful. See statusChangeCallback() for when this call is made
    function basicAPIRequest() {
        FB.api('/me',
            {fields: "id,about,age_range,picture,bio,birthday,context,email,first_name,gender,hometown,link,location,middle_name,name,timezone,website,work"},
            function(response) {
                //check result successful logination in console
                console.log('API response -->', response);
                console.log('Successful login for: ' + response.name);

                //check data Users from Facebook, we can use here
                console.log(response.id);  //ID User
                console.log(response.name);
                console.log(response.first_name);
                console.log(response.gender);
                console.log(response.age_range.min);  //age User
                console.log(response.email);
                console.log(response.picture.data.url); //URL image User - avatar
                console.log(response.link);  //"https://www.facebook.com/app_scoped_user_id/1158893490844793/" - link to page User in Facebook

                /**_______________________________________________added me */
                /** Set my cookie for loginned User in my App only if we location in page login_with_facebook.php */
                    //if( location.pathname === '/login_with_facebook.php'){
                        document.cookie='user_id_in_fb='+response.id+'; path=/;';  //1158893490844793
                        document.cookie='user_name_in_fb='+response.name+'; path=/;';
                        document.cookie='user_gender_in_fb='+response.gender+'; path=/;';
                        document.cookie='user_email_in_fb='+response.email+'; path=/;';
                        document.cookie='user_avatar_in_fb='+response.picture.data.url+'; path=/;';
                        document.cookie='user_link_in_fb='+response.link+'; path=/;';
                   // }
                /**______________________________________________/added me */

                if( window.location.pathname == '/login_with_facebook.php') {
                    document.getElementById('status').innerHTML = '<span class="text-success">Thanks for logging in, ' + response.name + '!</span>';
                }
            }
        );
    }

    //testAPI(); basicAPIRequest();
    //checkLoginState();

    console.log('==========>>> '+window.location.pathname);

</script>
<!--
  Below we include the Login Button social plugin. This button uses the JavaScript SDK to present
   a graphical Login button that triggers the FB.login() function when clicked
-->

<!--if we are location on the "login In" page - display button with logination Facebook -->
<?php if( $_SERVER['PHP_SELF'] == '/login_with_facebook.php' ): ?>
<div id="login_button_in_fb">
    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"> <!--autologoutlink="true"-->
    </fb:login-button>
    <br>
    <div id="status"></div>
    <br><br>
    <div id="waiting"></div>
</div>
<?php endif; ?>


</body>
</html>
