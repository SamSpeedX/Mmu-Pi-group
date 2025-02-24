<?php

namespace kibalanga\core;

class Redirect
{
    public static function to($path)
    {
        header("location: {$path}");
    }
}