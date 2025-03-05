<?php

namespace kibalanga\Api;

class Api 
{    

    public static function post($url, $data)
    {
        $key = APP_NAME;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "app_key: {$key},",
        ]);

        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response = curl_exec($curl);

        if ($response == false) {
            echo json_encode(["status" => "error", "message" => curl_error($curl), "code" => $code]);
        } elseif ($code === 200) {
            $response = json_decode($response, true);
            echo json_encode($response);
        } else {
            echo json_encode(["status" => "fail", "code" => $code]);
        }
    }

    public static function get($url)
    {
        $key = APP_NAME;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "app_key: {$key}",
        ]);

        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response = curl_exec($curl);

        if ($response == false) {
            echo json_encode(["status" => "error", "message" => curl_error($curl), "code" => $code]);
        } elseif ($code === 200) {
            $response = json_decode($response, true);
            echo json_encode($response);
        } else {
            echo json_encode(["status" => "fail", "code" => $code]);
        }
    }
}