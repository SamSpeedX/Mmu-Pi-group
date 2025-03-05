<?php
namespace kibalanga\App\Model;
    
use kibalanga\core\Model;

class Cart 
{
    public function read($id) 
    {
        $sql = "SELECT * FROM `carts` WHERE id=:id";
        $parameter = [":uid" => $id];
        $result = Model::moja($sql, $parameter);

        if (isset($result["status"]) && $result["status"] == "success") {
            return $result["data"];
        }

        return $result["message"] ?? "An error occurred";
    }

    public function readAll()
    {
        $sql = "SELECT * FROM `carts`";
        $result = Model::somazote($sql, []);

        if (isset($result["status"]) && $result["status"] == "success") {
            return $result["data"];
        }

        return $result["message"] ?? "An error occurred";
    }

    public function create($key, $sellar_token, $buyer_token, $name, $description, $price, $total)
    {

        $sql = "SELECT * FROM `carts` WHERE name=:email";
        $parameter = [":email" => $name];
        $result = Model::moja($sql, $parameter);

        if (isset($result["status"]) && $result["status"] !== "success") {
            $sql = "INSERT INTO `carts` (sellar_token, buyer_token, name, description, price, total token) VALUES (:sellar_token, :buyer_token, :name, :description, :price, :total :token)";
            $token = uniqid('cart_') . bin2hex(random_bytes(4));
            $parameter = [":sellar_token" => $sellar_token, ":buyer_token" => $buyer_token, ":name" => $name, ":description" => $description, ":price" => $price, ":total" => $total,  ":token" => $token];
            $result = Model::moja($sql, $parameter);

            if ($result["status"] == "success") { 
                return ['status' => 'success'];
            } else {
                return $result['message'];
            }
        }

        return "Email is already taken!";
    }

    public function update($buyer_id, $total, $token)
    {
        
        $sql = "UPDATE `carts` SET total=:total WHERE buyer_token=:b AND token=:token";
        $parameter = [":total" => $total, ":b" => $buyer_id, ":token" => $token];

        $select = Model::moja($sql, $parameter);
        if ($select['status' == 'sucess']) {
            return ['status' => 'success'];
        }
        return $select['message'];
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `carts` WHERE buyer_token=:t AND token=:id";
        $parameter = [":t" => $_SESSION['token'], ":id" => $id];
        $result = Model::futa($sql, $parameter);

        if ($result["status"] == "success") {
            return ["status" => "success"];
        } else {
            return $result["message"];
        }
    }
}
    
