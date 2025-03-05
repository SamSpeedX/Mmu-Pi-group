<?php

namespace kibalanga\core;

class Verify
{
    public static function check($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
}