<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../config\config.php";
use kibalanga\core\Model;

session_start();

if (!isset($_SESSION['token'])) {
    header("location: /login");
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', "message" => 'Method Not Allowed', 'code' => 405]);
    exit;
}

$headers = getallheaders();
$key = isset($headers['key']) ? $headers['key'] : null;

if ($key === null) {
    http_response_code(401);
    echo json_encode(['status' => 'error', "message" => 'Unauthorized: API key missing', 'code' => 401]);
    exit;
}

$validApiKeys = [APP_KEY];
if (!in_array($key, $validApiKeys)) {
    http_response_code(403);
    echo json_encode(['status' => 'error', "message" => 'Forbidden: Invalid API key', 'code' => 403]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => json_last_error_msg(),
        "code" => 400
    ]);
    exit;
}

if (empty($data)) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "No data received",
        "code" => 400
    ]);
    exit;
}

$name = isset($data['name']) ? htmlspecialchars($data['name']) : null;
$img = isset($data['img']) ? htmlspecialchars($data['img']) : null;
$price = isset($data['price']) ? htmlspecialchars($data['price']) : null;
$quantity = isset($data['quantity']) ? htmlspecialchars($data['quantity']) : null;

if (!$name || !$img || !$price || !$quantity) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "Missing required fields",
        "code" => 400
    ]);
    exit;
}

$sql = "INSERT INTO `carts` (name, img, price, quantity) VALUES(:name, :img, :price, :quantity)";
$parameter = [":name" => $name, ":img" => $img, ":price" => $price, ":quantity" => $quantity];
$response = Model::weka($sql, $parameter);

if ($response['status'] == 'sussess') {
    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "message" => "Added to Cart!",
        "code" => 200
    ]);
    exit;
} elseif ($response['status'] == 'error') {
    http_response_code(200);
    echo json_encode([
        "status" => "error",
        "message" => "Something went wrong!",
        "code" => 200
    ]);
    exit;
}
exit;
?>
