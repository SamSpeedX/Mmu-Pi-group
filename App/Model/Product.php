<?php
namespace kibalanga\App\Model;
    
use kibalanga\core\Model;
 
class Product 
{
    public function read($id) 
    {
        $sql = "SELECT * FROM `products` WHERE id=:id";
        $parameter = [":uid" => $id];
        $result = Model::moja($sql, $parameter);

        if (isset($result["status"]) && $result["status"] == "success") {
            return $result["data"];
        }

        return $result["message"] ?? "An error occurred";
    }

    public function readAll()
    {
        $sql = "SELECT * FROM `products`";
        $parameter = [];
        $result = Model::somazote($sql, $parameter);

        if (isset($result["status"]) && $result["status"] == "success") {
            return $result["data"];
        }

        return $result["message"] ?? "An error occurred";
    }

    public function create($name, $description, $price, $img, $category, $date, $total)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `products` (
            `id` INT NOT NULL AUTO_INCREMENT , 
            `name` VARCHAR(100) NOT NULL , 
            `description` VARCHAR(100) NOT NULL , 
            `price` VARCHAR(100) NOT NULL , 
            `img` VARCHAR(100) NOT NULL ,
            `category` VARCHAR(100) NOT NULL ,
            `date` VARCHAR(100) NOT NULL ,
            `total` VARCHAR(100) NOT NULL ,
            `token` VARCHAR(100) NOT NULL , 
            `created_at` TIMESTAMP(6) NOT NULL , 
            PRIMARY KEY (`id`)
        ) ENGINE = InnoDB;";

        $t = Model::createTable($sql);

        if ($t['status'] !== 'success') {
           echo json_encode($t['message']);  
        }

        $sql = "SELECT * FROM `products` WHERE name=:email";
        $parameter = [":email" => $name];
        $result1 = Model::moja($sql, $parameter);
        // echo json_encode($result1);
        
        if ($result1["status"] !== "success") {
            $sql = "INSERT INTO `products` (name, description, price, img, category, date, total, token, created_at) VALUES (:name, :description, :price, :img, :category, :date, :total, :token, :created_at)";
            $token = uniqid('product_') . bin2hex(random_bytes(4));
            $parameter = [
                ':name' => $name, 
                ':description' => $description, 
                ':price' => $price, 
                ':img' => $img, 
                ':category' => $category, 
                ':date' => $date, 
                ':total' => $total, 
                ':token' => $token,
                ':created_at' => date('d-m-y')
            ];
            $result = Model::weka($sql, $parameter);

            if ($result["status"] == "success") {
                return ['status' => $result["status"]];
            } else {
                return ['status' => 'fail', 'message' => $result['message']];
            }
        }

        return ['status' => 'fail', 'message' => "Product name is already taken!"];
        // echo json_encode($result1);

    }

    public function update($name, $description, $price, $img, $category, $date, $total)
    {        
        $sql = "UPDATE `products` SET username=:name, email=:email WHERE token=:id";
        $parameter = [':name' => $name, ':description' => $description, ':price' => $price, ':img' => $img, ':category' => $category, ':date' => $date, ':total' => $total, ':created_at' => $category];
        $result = Model::badili($sql, $parameter);

        return $result["status"] == "success" ? "Update successful!" : $result["message"];
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE token=:id";
        $parameter = [":id" => $id];
        $result = Model::futa($sql, $parameter);

        if ($result["status"] == "success") {
            return ['status' => 'success'];
        }

        return ['status' => 'fal', 'message' => $result["message"]];
    }

    public function deleteAll($re)
    { 
        $s = $re;
        $sql = "DELETE FROM `products`";
        $parameter = [];
        $result = Model::futa($sql, $parameter);

        if ($result["status"] === "success") {
            return ['status' => 'success'];
        } else {
            return ['message' => $result["message"]];
        }

        // return $result["status"] == "success" ? "Product deleted successfully!" : $result["message"];
    }
}
    
