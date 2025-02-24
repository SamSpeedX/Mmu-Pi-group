<?php

$url = "http://localhost:8080/get-product";
$p = curl_init($url);
curl_setopt($p, CURLOPT_RETURNTRANSFER, true);
curl_setopt($p, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($p, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$code = curl_getinfo($p, CURLINFO_HTTP_CODE);
$response = curl_exec($p);

if ($response == false) {
    echo curl_error($p);
} elseif ($code == 200) {
    $data = json_decode($response, true);
    echo $data;
} else {
    echo $code;
}