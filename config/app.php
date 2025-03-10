<?php

class Envii 
{
    public static function load($file)
    {
        if (! file_exists($file)) {
            echo "env file not found!";
        }

        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}
Envii::load('.env');
define('APP_NAME', $_ENV['APP_NAME']);
define('APP_KEY', $_ENV['APP_KEY']);
define('DEV', $_ENV['DEV']);
define('SLOGAN', $_ENV['SLOGAN']);

// TWILIO
define('TWILIO_NUMBER', $_ENV['TWILIO_NUMBER']);
define('TWILIO_SID', $_ENV['TWILIO_SID']);
define('TWILIO_TOKEN', $_ENV['TWILIO_TOKEN']);

// ZENOPAY
define('ZENO_ID', $_ENV['ZENO_ID']);
define('ZENO_API', $_ENV['ZENO_API']);
define('ZENO_SECRET', $_ENV['ZENO_SECRET']);

define('DATABASE', $_ENV['DATABASE']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_PORT', $_ENV['DB_PORT']);

define('AUTHENTIC_ID', $_ENV['AUTHENTIC_ID']);
define('AUTHENTIC_SECRETE', $_ENV['AUTHENTIC_SECRETE']);

define('CAPTCHAHTML', $_ENV['CAPTCHAHTML']);
define('CAPTCHASITE', $_ENV['CAPTCHASITE']);