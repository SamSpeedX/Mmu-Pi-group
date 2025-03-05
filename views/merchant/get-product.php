<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "../../vendor/autoload.php";

use kibalanga\core\Model;

session_start();

class Extra 
{
    public static function load($file)
    {
        if (!file_exists($file)) {
            die(json_encode(['status' => 'error', 'message' => 'env file not found!']));
        }

        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

Extra::load('../../.env');

define('APP_NAME', $_ENV['APP_NAME']);
define('APP_KEY', $_ENV['APP_KEY']);
define('DEV', $_ENV['DEV']);
define('DATABASE', $_ENV['DATABASE']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Content-Type: application/json");

    $token = htmlspecialchars('67b8d27aa0d73385adb01'); // $_SESSION['token']);
    
    if (empty($token)) {
        echo json_encode(['status' => 'error', 'message' => 'Token is empty']);
        exit;
    }

    $sql = "SELECT * FROM `products` WHERE token = :token";
    $parameter = [':token' => $token];
    $response = Model::somazote($sql, $parameter);

    if ($response['status'] === 'success' && !empty($response['data'])) {
        $majina = [];
        $totals = [];

        foreach ($response['data'] as $product) {
            $majina[] = $product['name'];
            $totals[] = $product['total'];
        }

        http_response_code(200);
        echo json_encode(['status' => 'success', 'majina' => $majina, 'idadi' => $totals]);
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'No products found']);
    }
}
