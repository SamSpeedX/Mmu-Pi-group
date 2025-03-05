<?php

$client = new Google_Client();
$client->setClientId(AUTHENTIC_ID); // Replace with your client ID
$client->setClientSecret(AUTHENTIC_SECRETE); // Replace with your client secret
$client->setRedirectUri('http://127.0.0.1:8000/callback'); // Replace with your redirect URI
$client->addScope('email');

$loginUrl = $client->createAuthUrl();
if ($loginUrl) {
header('Location: ' . $loginUrl);
exit();
}
?>