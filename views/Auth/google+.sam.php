<?php

$client = new Google_Client();
$client->setClientId(AUTHENTIC_ID);
$client->setClientSecret(AUTHENTIC_SECRETE);
$client->setRedirectUri('http://127.0.0.1:8000/register_callback');
$client->addScope('email');
$client->addScope('profile');

$loginUrl = $client->createAuthUrl();
if ($loginUrl) {
header('Location: ' . $loginUrl);
exit();
}
?>