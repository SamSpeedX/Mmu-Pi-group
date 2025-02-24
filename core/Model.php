<?php

namespace kibalanga\core;

use kibalanga\core\Database;
use PDO;
use PDOException;

class Model
{
    private static function connect()
    {
        $sam = new Database();
        return $sam->connect();
    }

    // public static function P($sql, $parameter, $paginationNo)
    // {
    //     $kbalanga = self::connect();

    //     try {
    //         $stmt = $kbalanga->prepare($sql);
    //         $stmt->execute([], );
    //    } catch (\Throwable $th) {
    //         //throw $th;
    //     }
    // }

    private static function sqlite()
    {
        $sam = new Database();
        return $sam->sqlite();
    }

    public static function App_Key()
    {
        $kibalanga = self::sqlite();

        try {
            $sql = "SELECT * FROM `jobs`";
            $stmt = $kibalanga->prepare($sql);
            $stmt->execute();
            $app = $stmt->fetch(PDO::FETCH_ASSOC);

            if (APP_KEY !== $app['app_key']) {
                return "Invalid APP KEY";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function keyCheck($token)
    {
        $kibalanga = self::sqlite();

        try {
            $sql = "SELECT * FROM `jobs` WHERE app_key=:token";
            $stmt = $kibalanga->prepare($sql);
            $stmt->bindParam(":token", $token, PDO::PARAM_STR);
            $stmt->execute();
            $app = $stmt->fetch(PDO::FETCH_ASSOC);

            if (APP_KEY !== $app['app_key']) {
                return "Invalid APP KEY";
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function createTable($sql)
    {
        $db = self::connect();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return ['status' => 'success', 'message' => 'Table created successful!'];
        } catch (PDOException $e) {
            return ['message' => $e->getMessage()];
        }
    }

    public static function moja($sql, $parameter)
    { 
        $db = self::connect();

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute($parameter);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                $rows = $stmt->rowCount();
                return ["status" => "success", "data" => $result, 'rows' => $rows];
            }

            return ["status" => "fail", "message" => "No data found"];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => "Database error occurred:- ".$e->getMessage()];
        }
    }

    public static function somazote($sql, $parameter)
    { 
        $db = self::connect();

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute($parameter);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($result) {
                $rows = $stmt->rowCount();
                return ["status" => "success", "data" => $result, 'rows' => $rows];
            }

            return ["status" => "fail", "message" => "No data found"];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => "Database error occurred ". $e->getMessage()];
        }
    }

    public static function weka($sql, $parameter)
    { 
        $db = self::connect();

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute($parameter);
            
            if ($stmt->rowCount() > 0) {
                return ["status" => "success"];
            }

            return ["status" => "fail", "message" => "Failed to insert data"];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e->getMessage()."Database error occurred"];
        }
    }

    public static function badili($sql, $parameter)
    { 
        $db = self::connect();

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute($parameter);
            
            if ($stmt->rowCount() > 0) {
                return ["status" => "success"];
            }

            return ["status" => "fail", "message" => "No data updated"];
        } catch (PDOException $e) {
            return ['status' => "error", "message" => "Database error occurred"];
        }
    }

    public static function futa($sql, $parameter)
    { 
        $db = self::connect();

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute($parameter);
            
            if ($stmt->rowCount() > 0) {
                return ["status" => "success"];
            }

            return ['status' => "fail", "message" => "No data deleted"];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => "Database error occurred"];
        }
    }
}
