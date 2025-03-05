<?php

use kibalanga\core\Request;

$response = Request::readAll("users");

if ($response['status'] == 'success') {
    $users =  $response['data'];
} else {
    $users = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user | <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/userform.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
    <h1>All user</h1>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <th style="border: 2px solid blue; padding: 1rem; background-color: gray;">Name</th>
            <th style="border: 2px solid blue; padding: 1rem; background-color: gray;">Email</th>
            <th style="border: 2px solid blue; padding: 1rem; background-color: gray;">Token</th>
            <th style="border: 2px solid blue; padding: 1rem; background-color: gray;">Role</th>
        </thead>
        <tbody>
            <?php if ($users) { foreach($users as $user) {?>
                <tr>
                    <td style="border: 2px solid blue; padding: 1rem; background-color: lightslategray;"><?php echo htmlspecialchars($user['username']); ?></td>
                    <td style="border: 2px solid blue; padding: 1rem; background-color: lightslategray;"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td style="border: 2px solid blue; padding: 1rem; background-color: lightslategray;"><?php echo htmlspecialchars($user['token']); ?></td>
                    <td style="border: 2px solid blue; padding: 1rem; background-color: lightslategray;"><?php echo htmlspecialchars($user['role']); ?></td>
                </tr>
            <?php } } else {?>
                <p>No user yet boss!</p>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
    