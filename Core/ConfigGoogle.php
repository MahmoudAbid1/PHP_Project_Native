<?php
require_once __DIR__ . '/../vendor/autoload.php';


//------ init configuration file -----------//
$clientID = '414590756141-tq6mu2kvnobp7euqasj5t22teou52ja7.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/projectWeb/View/BookFlixClient/index.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
session_start();
?>