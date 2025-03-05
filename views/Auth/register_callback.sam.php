<?php
// session_start();
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId(AUTHENTIC_ID);
$client->setClientSecret(AUTHENTIC_SECRETE);
$client->setRedirectUri('http://127.0.0.1:8000/register_callback'); 
$client->addScope('email');
$client->addScope('profile');

// Angalia kama kuna "code" kutoka kwa Google
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // Pata taarifa za mtumiaji
        $oauth2 = new Google_Service_Oauth2($client);
        $userInfo = $oauth2->userinfo->get();

        // Hifadhi taarifa za mtumiaji
        $google_id = $userInfo->id;
        $name = $userInfo->name;
        $email = $userInfo->email;
        $img = $userInfo->picture;
        $pass = password_hash(bin2hex(random_bytes(6)), PASSWORD_DEFAULT);

        header("Content-Type: application/json");
        echo json_encode($userInfo);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="#">
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="email" name="email" id="emal" >
    </form>
</body>
</html>