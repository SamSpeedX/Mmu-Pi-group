<?php

namespace kibalanga\App\Model;

use kibalanga\core\App;
use kibalanga\core\Model;

class User 
{

    public function CreateTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `users` (
            `id` INT NOT NULL AUTO_INCREMENT ,
            username VARCHAR(100) NOT NULL, 
            email  TEXT NOT NULL, 
            password TEXT  NOT NULL,
            phone TEXT  NOT NULL,
            account TEXT  NOT NULL,
            bname TEXT  NOT NULL,
            country TEXT  NOT NULL,
            nida TEXT  NOT NULL,
            tin TEXT  NOT NULL,
            token TEXT  NOT NULL,
            created_at TIMESTAMP(6) NOT NULL,
            PRIMARY KEY (`id`)
        );";
        $respo = Model::createTable($sql);
        echo json_encode($respo);
        if ($respo['status'] == 'success') {
            return $respo['message'];
        }
    }

    // public static function find($name)
    // {
    //     $sql = "";
    //     $pameter = Model::fnd();
    // }

    public function read($id) 
    {
        if (!empty($key)) {
            return App::key($key);
        }

        $sql = "SELECT * FROM `users` WHERE token=:uid";
        $parameter = [":uid" => $id];
        $result = Model::moja($sql, $parameter);

        if ($result["status"] == "success") {
            return $result["data"];
        }

        return $result["message"] ?? "An error occurred";
    }

    public function readAll()
    {
        if (!empty($key)) {
            return App::key($key);
        }

        $parameter = [];
        $sql = "SELECT * FROM `users`";
        $result = Model::somazote($sql, $parameter);

        if (isset($result["status"]) && $result["status"] == "success") {
            return $result["data"];
        }

        return $result["message"] ?? "An error occurred";
    }

    public function login($email, $password)
    {
        if (!empty($key)) {
            return App::key($key);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['status' => 'fail', 'message' => 'invalid email'];
        }

        $sql = "SELECT * FROM `users` WHERE email=:email";
        $parameter = [":email" => $email];
        $result = Model::moja($sql, $parameter);

        if ($result['status'] == 'success') {
            $sql = "SELECT * FROM `users` WHERE email=:email";
            $parameter = [":email" => $email];
            $result = Model::moja($sql, $parameter);
    
            if ($result['status'] == 'success') {
                $user = $result['data'];
                
                if (password_verify($password, $user['password'])) {
                    return ['status' => 'success', 'id' => $user['token'], 'role' => $user['role']];
                } else {
                    return ['status' => 'fail', 'message' => "Invalid password!"];
                }
            } else {
                return ['status' => 'fail', 'message' => "Invalid email!"];
            }
        } else {
            return ['status' => 'fail', 'message' => "email not found!"];
        }
    }

    public static function b($key, $name, $email, $password, $address, $account, $bname, $country, $nida, $tin, $location)
    {
        if (!empty($key)) {
            return App::key($key);
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email address";
        }

        $sql = "SELECT * FROM `users` WHERE email=:email";
        $parameter = [":email" => $email];
        $result = Model::moja($sql, $parameter);

        if ($result["status"] !== "success") {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (username, email, password, address, role, token) VALUES (:username, :email, :password, :address, :account, :token)";
            $token = uniqid() . bin2hex(random_bytes(4));
            $parameter = [":username" => $name, ":email" => $email, ":password" => $hashedPassword, ":address" => $address, ':role' => $account, ":token" => $token];
            $resulta = Model::weka($sql, $parameter);

            if ($resulta["status"] == "success") {
                $sql = "INSERT INTO `marchant` (status, country, nida, tin, location, token) VALUES (:status, :country, :nida, :tin, :location, :token)";
                $parameter = [':status' => null, ':country'  => $country, ':nida' => $$nida, ':tin' => $tin, ':location' => $location, ':token' => $token];
                $resultas = Model::weka($sql, $parameter);

                if ($resultas["status"] == "success") {
                    return ['status' => 'success'];
                } else {
                    return ['status' => 'fail', 'message' => $resulta["message"]];
                }
            } else {
                return ['status' => 'fail', 'message' => $resulta["message"]];
            }
        }

        return ['status' => 'fail', 'message' => "Email is already taken!"];
    }

    public function create($key, $name, $email, $password, $address, $role) //, $phone, $account, $bname, $country, $nida, $tin)
    {
        if (!empty($key)) {
            return App::key($key);
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email address";
        }

        $sql = "SELECT * FROM `users` WHERE email=:email";
        $parameter = [":email" => $email];
        $result = Model::moja($sql, $parameter);

        if ($result["status"] !== "success") {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (username, email, password, address, role, token) VALUES (:username, :email, :password, :address, :role, :token)";
            $token = uniqid() . bin2hex(random_bytes(4));
            $parameter = [":username" => $name, ":email" => $email, ":password" => $hashedPassword, ":address" => $address, ':role' => $role, ":token" => $token];
            $resulta = Model::weka($sql, $parameter);

            if ($resulta["status"] == "success") {
                return ['status' => 'success'];
            } else {
                return ['status' => 'fail', 'message' => $resulta["message"]];
            }
        }

        return ['status' => 'fail', 'message' => "Email is already taken!"];
    }

    public function profile($img, $token)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `profiles` (
            `id` INT NOT NULL AUTO_INCREMENT ,
            `image` VARCHAR(255) NOT NULL ,
            `token` VARCHAR(50) NOT NULL ,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
            PRIMARY KEY(`id`)
        );";
        $respond = Model::createTable($sql);
        // echo json_encode($respond);
        if ($respond['status'] !== 'success') {
            return ['status' => 'fail', $respond['message']];
        } else {
            $sql = "SELECT * FROM `users` WHERE token=:token";
            $parameter = [':token' => $token];
            $response = Model::moja($sql, $parameter);
            
            if ($response['status'] === 'success') {
                $sql = "SELECT * FROM `profiles` WHERE token=:token";
                $parameter = [':token' => $token];
                $response = Model::moja($sql, $parameter);
    
                if ($response['status'] == 'success') {
                    $sql = "UPDATE `profiles` SET image=:image WHERE token=:token";
                    $parameter = ['image' => $img, ':token' => $token];
                    $responses = Model::badili($sql, $parameter);
    
                    if ($responses['status'] == 'success') {
                        return ['status' => 'success'];
                    } else {
                        return ['status' => 'fail', 'message' => $responses['message']];
                    }
    
                } else {
                    $sql = "INSERT INTO `profiles` (image, token) VALUES (:image, :token)";
                    $parameter = ['image' => $img, ':token' => $token];
                    $response = Model::weka($sql, $parameter);
    
                    if ($response['status'] == 'success') {
                        return ['status' => 'success'];
                    } else {
                        return ['status' => 'fail', 'message' => $response['message']];
                    }
    
                }
            }
        }
    }

    public function update($key, $name, $email, $password)
    {

        if (!empty($key)) {
            return App::key($key);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email address";
        }
        $pass = password_hash($password, PASSWORD_DEFAULT);

        if (empty($password)) {
            $sql = "UPDATE `users` SET username=:name, email=:email WHERE email=:id";
            $parameter = [":name" => $name, ":email" => $email, ":id" => $email];
            $result = Model::badili($sql, $parameter);
    
            return $result["status"] == "success" ? "Update successful!" : $result["message"];
        } else {
            $sql = "UPDATE `users` SET username=:name, email=:email, password=:pass WHERE email=:id";
            $parameter = [":name" => $name, ":email" => $email, ":id" => $email, ":pass" => $pass];
            $result = Model::badili($sql, $parameter);
    
            return $result["status"] == "success" ? "Update successful!" : $result["message"];
        }
        
    }

    public function deletep($key, $id)
    {
        if (!empty($key)) {
            return App::key($key);
        }

        $sql = "DELETE FROM `users` WHERE token=:id";
        $parameter = [":id" => $id];
        $result = Model::futa($sql, $parameter);

        if ($result["status"] == "success") {
            return ['status' => 'success'];
        } else {
            return ['status' => 'fail', 'message' => $result['message']];
        }
    }

    public function delete($key, $id)
    {
        if (!empty($key)) {
            return App::key($key);
        }

        $sql = "DELETE FROM `users` WHERE token=:id";
        $parameter = [":id" => $id];
        $result = Model::futa($sql, $parameter);

        if ($result["status"] == "success") {
            return ['status' => 'success'];
        } else {
            return ['status' => 'fail', 'message' => $result['message']];
        }
    }

    public function googlePlus($key, $token, $name, $email, $img)
    {
        if (!empty($key)) {
            return App::key($key);
        }

        $sql = "SELECT email, token FROM `users` WHERE email=:email AND token=:t";
        $parameter = [':email' => $email, ':t' => $token];

        $result = Model::moja($sql, $parameter);
        if ($result['status'] !== 'success') {
            $role = null;
            $address = 'Dodoma Tanzania';
            $hashedPassword = password_hash(bin2hex(random_bytes(6)), PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (username, email, password, address, role, token) VALUES (:username, :email, :password, :address, :role, :token)";
            $parameter = [":username" => $name, ":email" => $email, ":password" => $hashedPassword, ":address" => $address, ':role' => $role, ":token" => $token];
            $jibu = Model::weka($sql, $parameter);

            if ($jibu['status'] == 'success') {
                $sql = "SELECT * FROM `profiles` WHERE token=:token";
                $parameter = [':token' => $token];
                $response = Model::moja($sql, $parameter);
    
                if ($response['status'] == 'success') {
                    $sql = "UPDATE `profiles` SET image=:image WHERE token=:token";
                    $parameter = ['image' => $img, ':token' => $token];
                    $responses = Model::badili($sql, $parameter);
    
                    if ($responses['status'] == 'success') {
                        return ['status' => 'success'];
                    } else {
                        return ['status' => 'fail', 'message' => $responses['message']];
                    }
    
                } else {
                    $sql = "INSERT INTO `profiles` (image, token) VALUES (:image, :token)";
                    $parameter = ['image' => $img, ':token' => $token];
                    $response = Model::weka($sql, $parameter);
    
                    if ($response['status'] == 'success') {
                        return ['status' => 'success'];
                    } else {
                        return ['status' => 'fail', 'message' => $response['message']];
                    }
    
                }
            } else {
                return ['status' => 'error', 'meessage' => $jibu['message']];
            }
        } else {
            return ['status' => 'error', 'message' => 'Email already taken!'];
        }
    }
}
