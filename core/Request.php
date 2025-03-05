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

    public static function ReadWhereToken($table, $token)
    {
        $sql = "SELECT * FROM `$table` WHERE token=:token";
        $parameter = [':token' => $token];
        $response = Model::somazote($sql, $parameter);
        return $response;
    }

    public static function ReadOneWhereToken($table, $token)
    {
        $sql = "SELECT * FROM `$table` WHERE token=:token";
        $parameter = [':token' => $token];
        $response = Model::moja($sql, $parameter);
        return $response;
    }

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

    public static function FindWhereName($table, $name) {
        $sql = "SELECT * FROM `$table` WHERE name=:name";
        $parameter = [":name" => $name];
        return Model::somazote($sql, $parameter);
    }

    public static function FindWhereId($table, $id) {
        $sql = "SELECT * FROM `$table` WHERE id=:name";
        $parameter = [":name" => $id];
        return Model::somazote($sql, $parameter);
    }

    public static function FindWhereCategory($table, $category) {
        $sql = "SELECT * FROM `$table` WHERE category=:name";
        $parameter = [":name" => $category];
        return Model::somazote($sql, $parameter);
    }

    public static function readAllCategory($table) {
        $sql = "SELECT * FROM `$table` GROUP BY category LIMIT 5";
        $parameter = [];
        return Model::somazote($sql, $parameter);
    }
}
