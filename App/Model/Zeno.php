<?php

namespace kibalanga\App\Model;

use kibalanga\core\Model;

class Zeno 
{
    public function last($key)
    {
        if ($key !== APP_KEY) {
            return ['status' => 'error', 'message' => 'Invalid key!'];
        }

        $sql = "SELECT * FROM `zeno_orders` WHERE token=:token ORDER BY DESC";
        $jibu = Model::somazote($sql, [':token' => $_SESSION['token']]);

        if ($jibu['status'] == "status") {
            return ['status' => 'success', 'data' => $jibu['data']];
        } else {
            return ['status' => 'error', 'message' => $jibu['message']];
        }
    }

    public function orders($key)
    {
        if ($key !== APP_KEY) {
            return ['status' => 'error', 'message' => 'Invalid key!'];
        }

        $sql = "SELECT * FROM `zeno_orders` ORDER BY DESC";
        $jibu = Model::somazote($sql, []);

        if ($jibu['status'] == "status") {
            return ['status' => 'success', 'data' => $jibu['data']];
        } else {
            return ['status' => 'error', 'message' => $jibu['message']];
        }
    }

    public function create($key, $order)
    {
        if ($key !== APP_KEY) {
            return ['status' => 'error', 'message' => 'Invalid key!'];
        }

        $token = $_SESSION['token'];
        $sql = "SELECT * FROM `zeno_orders` WHERE order_id=:id AND token=:t";
        $parameter = [':id' => $order, ':t' => $token];
        $response = Model::moja($sql, $parameter);
        if ($response['status'] !== 'success') {
            $sql = "INSERT INTO `zeno_orders` (token, order_id) VALUES (:token, :id)";
            $parameter = [":id" => $order];
            $jibu = Model::weka($sql, $parameter);

            if ($jibu['status'] == 'success') {
                return ['status' => 'success'];
            } else {
                return ['status' => 'error', 'message' => $jibu['message']];
            }
        }
    }
}