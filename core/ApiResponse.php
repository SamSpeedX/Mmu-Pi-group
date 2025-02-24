<?php
namespace sam\core;

class ApiResponse
{
    public static function send($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function error($message) {
        http_response_code(400);
        return ['status' => "error", "message" => $message];
    }
}
?>