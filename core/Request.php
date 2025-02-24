<?php

namespace kibalanga\core;

use kibalanga\core\Model;

class Request
{

    public static function read($table, $token)
    {
        $sql = "SELECT * FROM `{$table}` WHERE token=:token";
        $parameter = $token;
        $response = Model::moja($sql, $parameter);
        return $response;
    }

    public static function readAll($table)
    {
        $sql = "SELECT * FROM `{$table}`";
        $parameter = [];
        $response = Model::somazote($sql, $parameter);
        return $response;
    }

    // public static function productP($rows)
    // {
    //     $sql = "SELECT * FROM `products` GROUP BY name LIMIT :limit";
    //     $parameter = [':limit' => $rows];
    //     $response = Model::somazote($sql, $parameter);
    //     return $response;
    // }

    // public static function productP(int $rows)
    // {
    //     $sql = "SELECT * FROM `products` GROUP BY name LIMIT ?";
    //     $parameter = [$rows];
    //     $response = Model::somazote($sql, $parameter);
    //     return $response;
    // }

    public static function productP(int $rows)
{
    $sql = "SELECT * FROM `products` ORDER BY id DESC LIMIT " . intval($rows);
    $response = Model::somazote($sql, []);
    return $response;
}


    public static function paginate($table, $rowNo)
    {
        // i
        $sql = "SELECT * FROM `$table` LIMIT :limit OFFSET :offset";
        $parameter = [':limit' => $rowNo];
        $response = Model::somazote($sql, $parameter);
        return $response;
    }
}