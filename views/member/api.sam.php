<?php
// 
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $token = htmlspecialchars($data['token']);
    $type = htmlspecialchars($data['type']);

    if ($type === 'hits') {
        // 
    }

    if ($type === 'solid_product') {
        // 
    }

    if ($type === 'report') {
        // 
    }
}