<?php

namespace kibalanga\core;

use kibalanga\core\Model;

class App
{
    public static function App()
    {
       return Model::App_Key();
    }

    public static function security($token)
    {
        Model::keyCheck($token);
    }

    public static function guard($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        // $data = 

        return $data;
    }
}