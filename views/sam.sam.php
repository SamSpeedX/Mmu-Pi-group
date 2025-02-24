<?php

use kibalanga\core\Request;
// echo json_encode($_GET);

$data = [':token' => $_SESSION['token']];

$response = Request::read('users', $data);
echo json_encode($response);
?>