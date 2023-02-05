
 <?php
  
 include('User.php'); 

 require_once 'vendor/autoload.php';
 session_start();
 //------ init configuration file -----------//
 $clientID = '429250210935-6ho7faabbj8ughst6anuo2pm9emjacpd.apps.googleusercontent.com';
 $clientSecret = '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';
 $redirectUri = 'http://localhost/projectWeb/now-ui-dashboard-master/examples/dashboard.php';
 
 // create Client Request to access Google API
 $client = new Google_Client();
 $client->setClientId($clientID);
 $client->setClientSecret($clientSecret);
 $client->setRedirectUri($redirectUri);
 $client->addScope("email");
 $client->addScope("profile");
 //------- end config file ------------//
 
 $_SESSION['test'] = $client;
 // authenticate code from Google OAuth Flow
 if (isset($_GET['code'])) {
   $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
   $client->setAccessToken($token['access_token']);
 
   // get profile info
   $google_oauth = new Google_Service_Oauth2($client);
   $google_account_info = $google_oauth->userinfo->get();
   $email =  $google_account_info->email;
   $name =  $google_account_info->name;
    
   // now you can use this profile info to create account in your website and make user logged in.
   print_r($google_account_info);
   
   $usergoogleEmail=$google_account_info['email'];
   $usergoogleuUsername=$google_account_info['givenName'];
   $usergoogleId=$google_account_info['id'];
   $usergoogle=new User('',$usergoogleuUsername,'0000',$usergoogleEmail,'0000');
   //CrudUser::insert($usergoogle);

 } else {
    $social = "social";
    $icon_class = "fab fa-google-plus-g";
//    echo "<a href='".$client->createAuthUrl()."' class ='".$social."'><i class='".$icon_class."'></i></a>";
 }


 //-----------------------------------------

     if(isset($_POST['Login']))
     {
        $userController = new CrudUser();
        
        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];
        if($userEmail != null && $userEmail!= ""){
            
            $_SESSION['userEmail'] = $userEmail;
        }
        if($userPassword!=null && $userPassword!=""){
            $_SESSION['userPassword'] = $userPassword;
        }
        if($userEmail != null && $userEmail!= "" && $userPassword!=null && $userPassword!="")
        {
            $userController->Verifie($userEmail,$userPassword);
          
        }
     }
     $phone_number="";
     
     $username=$email=$password=$confirmePassword="";
     
     $errors=array('username'=>'','password'=>'','confirmePassword'=>'','email'=>''); 
     
     if(isset($_POST['submit']) ) //if there is data on the input filed
     {    
         if(empty($_POST['username']))//if the filed of the username is empty
             { 
                 //$errors['username'] = "You have to enter your Username ";

             }else
                 {
                     htmlspecialchars($username=$_POST['username']);

                     if(!preg_match('/^[a-zA-Z\s]+$/', $username))
                     {
                        // echo "Username must be letters and spaces only";
                     }
                 }
         if(empty($_POST['password']))//if the filed of the Password is empty
             { 
                 //$errors['password'] = "try an other password please ";

             }else
             {
                 htmlspecialchars($password=$_POST['password']);
             }
         if(empty($_POST['phone_number']))//if the filed of the ConfirmePassword is empty
             { 
                 //$errors['confirmePassword'] = "You have to confirme your password !";

             }else
                 {
                    
                      htmlspecialchars($phone_number=$_POST['phone_number']); 
                     
                 }
         if(empty($_POST['email']))//if the filed of the email is empty
             {
                 // $errors['email'] = "try an other email please ";
             }
             else{
                     htmlspecialchars($email=$_POST['email']);
                   
                     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                   
                       //  echo 'Email must be a valid email address';
                 }
                 
             }
         if(array_filter($errors))
             {
                 //echo "error form invalid";
                //we can implimente the pop up of failed here
             }
         else{
                 echo "form valid";

                 $user = new User('',$username,$password,$email,$phone_number );
                 
                 CrudUser::insert($user);
                 
                 //We can implimente the pop up of success here
             }
     } 
     
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project Name</title>
        <link rel="stylesheet" href="styleLogin.css">
        <script src="https://kit.fontawesome.com/e326d32ffe.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <!-- <h2>Weekly Coding Challenge #1: Sign in/up Form</h2> -->
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#" method="post">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="<?php $client->createAuthUrl(); ?>" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php $client->createAuthUrl(); ?>" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" id="username" onkeydown="return /[a-z]/i.test(event.key)" name="username" autofocus placeholder="Username" value="<?php echo htmlspecialchars($username) ?>">
                    <input type="email"  name="email" autofocus placeholder="Email Adresse" value="<?php echo htmlspecialchars($email) ?>" >
                    <input type="password" name="password" autofocus placeholder="password" value="<?php echo htmlspecialchars($password) ?>" >
                    <input type="text" name="phone_number" placeholder="Phone Number" />
                    <button type="submit" name="submit">Sign Up</button>
                </form>
                
            </div>
            
            <!-- ./now-ui-dashboard-master/examples/dashboard.php -->
            <div class="form-container sign-in-container">
                <form action="" method="post">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo $client->createAuthUrl(); ?>" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input type="email" name="email" placeholder="Email" />
                    <input type="password"name="password" placeholder="Password" />
                    <a href="forgetPassword1.php">Forgot your password?</a>
                    
                    <button name="Login">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <button type="submit"  name="submit" onclick="navigateToPHPFunction()">Sign Up</button> -->
        <footer>
            <p>
                Copy Right 2022-2023
            </p>
        </footer>
        <script src="main.js">

        </script>
    </body>
</html>