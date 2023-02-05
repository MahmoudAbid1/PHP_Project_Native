<?php
require_once 'vendor/autoload.php';

// init configuration
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

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  print_r($google_account_info);
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>