<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '542811287499-866rlfntvgs8k7vpdk6ph605iilfq72k.apps.googleusercontent.com'; //Google client ID
$clientSecret = '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'; //Google client secret
$redirectURL = 'http://localhost:80/prueba/index.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>