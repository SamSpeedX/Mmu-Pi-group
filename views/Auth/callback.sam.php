<?php

$client = new Google_Client();
$client->setClientId(AUTHENTIC_ID); // Replace with your client ID
$client->setClientSecret(AUTHENTIC_SECRETE); // Replace with your client secret
$client->setRedirectUri('http://127.0.0.1:8000/callback'); // Replace with your redirect URI
$client->addScope('openid');
$client->addScope('profile');
$client->addScope('email');


if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    echo "<pre>";
    print_r($userInfo);
    echo "</pre>";

    // $email = $userInfo->email;
    // $name = $userInfo->name;

    // echo "Hello, " . $name . ". Your email is " . $email . ".";
}
?>
