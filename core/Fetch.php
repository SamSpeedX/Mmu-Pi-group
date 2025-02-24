<?php

namespace kibalanga\core;

class Fetch
{
    public static function api($endpoint, $data)
    {
        $curl = curl_init($endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response = curl_exec($curl);

        if ($response !== false) {
            return json_encode(["status" => "fail", "message" => curl_error($curl)]);
        } elseif ($code === 200) {
            $datas = json_decode($response, true);
            return json_encode(['status' => 'success', 'data' => $datas]);
        }
    }
}