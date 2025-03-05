<?php

namespace kibalanga\core;

class ZenoPay
{
    public static function pay($emali, $name, $number, $amount, $webhook)
    {
        $url = "https://api.zeno.africa";
        
        $orderData = [
            'create_order' => 1,
            'buyer_email' => $emali ?? 'customer@gmail.com',
            'buyer_name' => $name,
            'buyer_phone' => $number,
            'amount' => $amount, #AMOUNT_TO_BE_PAID
            'account_id' => ZENO_ID, 
            'api_key' => ZENO_API, 
            'secret_key' => ZENO_SECRET,
            'webhook_url' => $webhook#'https://example.com/webhook'
        ];
        
        $queryString = http_build_query($orderData);
        
        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $queryString,
            ],
        ];
        $context = stream_context_create($options);
        
        $response = file_get_contents($url, false, $context);
        
        if ($response === FALSE) {
            return "Error: Unable to connect to the API endpoint.";
        }
        // return json_decode($response, true);
        $responseData = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return "Error decoding JSON: " . json_last_error_msg();
        }

        return $responseData; 
    }

    public static function card($name, $number, $email, $amount, $country, $webhook, $redirect_url, $cancell_url)
    {
        $url = 'https://api.zeno.africa/card';
        $data = array(
            'buyer_name'    => $name,
            'buyer_phone'   => $number,
            'buyer_email'   => $email,
            'amount'        => $amount,
            'billing.country' => $country, 
            'account_id'    => ZENO_ID,
            'webhook_url'   => 'https://example.com/success',
            'redirect_url'  => 'https://example.com/success',
            'cancel_url'    => 'https://example.com/cancel',
        );
        
        $validationErrors = validateInput($data);
        if (!empty($validationErrors)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validationErrors,
            ]);
            exit;
        }

        $jsonData = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return the response as a string
        curl_setopt($ch, CURLOPT_POST, true);  // HTTP POST method
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);  // Attach the JSON data
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',  // Indicate that we are sending JSON data
            'Accept: application/json'         // Expecting a JSON response
        ));
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            logError('cURL Error: ' . curl_error($ch));
            echo json_encode(['status' => 'error', 'message' => 'Request failed']);
            curl_close($ch);
            exit;
        }
        
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode !== 200) {
            logError("Error: Received HTTP code $httpCode from API.");
            echo json_encode(['status' => 'error', 'message' => 'API request failed']);
            curl_close($ch);
            exit;
        }
        
        curl_close($ch);
        $responseData = json_decode($response, true);
        
        return [
            'status' => 'success',
            'message' => 'Request was successful',
            'data' => $responseData
        ];
        
        /**
         * Log the API response for debugging.
         *
         * //@param mixed $response The response to log.
         */
        // function logResponse($response) {
        //     // Log response data to a file
        //     file_put_contents('response_log.txt', '[' . date('Y-m-d H:i:s') . '] ' . print_r($response, true) . "\n", FILE_APPEND);
        // }
    }

    public static function status($order_id)
    {
        $endpointUrl = "https://api.zeno.africa/order-status";
        
        // $order_id = "66d5e374ccaab";
        $order = Verify::check($order_id);
        
        $postData = [
            'check_status' => 1,
            'order_id' => $order,
            'api_key' => 'reyfyfufu',
            'secret_key' => 'YOUR SECRET KEY '
        ];
        
        $ch = curl_init($endpointUrl);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo json_encode([
                "status" => "error",
                "message" => 'cURL error: ' . curl_error($ch)
            ]);
        } else {
            $responseData = json_decode($response, true);
        
            if ($responseData['status'] === 'success') {
                return json_encode([
                    "status" => "success",
                    "order_id" => $responseData['order_id'],
                    "message" => $responseData['message'],
                    "payment_status" => $responseData['payment_status']
                ]);
            } else {
                return json_encode([
                    "status" => "error",
                    "message" => $responseData['message']
                ]);
            }
        }
        
        curl_close($ch);
    }
}