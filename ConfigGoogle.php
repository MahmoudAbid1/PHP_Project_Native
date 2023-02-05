<?php
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
?>