<?php

namespace kibalanga\core;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require "config/app.php";

class Router
{

    public static function view($url, $callback)
    {
        $njia = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if ($url === $njia) {
            
            if ($_GET === []) {
                if (array($callback)) {
                    self::vuta($callback);
                }

            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                self::post($url, $callback);
            }
            
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($_GET !== []) {
                    self::get($url, $callback);
                }
            }
        }
    }

    public static function get($url, $controllerClass)
    {
        $njia = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if ($njia == $url) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                self::post($url, $controllerClass);
            }


            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // if ($_GET === []) {
                //     self::view($url, $controllerClass);
                // } 

                if (!is_array($controllerClass)) {
                    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    //     self::vuta($controllerClass);
                    //     $response = $_GET;
                    // }

                    if ($_GET === []) {
                        self::view($url, $controllerClass);
                    }
                } 

                if (is_array($controllerClass)) {


                    if ($_GET !== []) {
                        $controller = $controllerClass[0];
                        $function = $controllerClass[1];
                        $controllerFile = "App/Controller/{$controller}.php";
                        if (file_exists($controllerFile)) {
                            require $controllerFile;
                            $request = $_GET;
                            $action = new $controller();
                            $response =  $action->$function($request);

                            if (is_array($response)) {
                                self::respond('', $response['message']);
                            } else {
                                self::respond('', $response);
                            }
                        } 
                        else {
                            self::respond("Warning", "No such Controller");
                        }
                    }
                }
            }
        }
    }

    public static function post($url, $controllerClass)
    {
        $jia = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if ($jia === $url) {
            $controller = $controllerClass[0];
            $function = $controllerClass[1];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controllerFile = "App/Controller/{$controller}.php";

                if (file_exists($controllerFile)) {
                    $request = $_POST;
                    require $controllerFile;
    
                    $action = new $controller();
                    $response =  $action->$function($request);
                    
                    if (is_array($response)) {
                        self::respond('', $response['message']);
                    } else {
                        self::respond('', $response);
                    }
                } else {
                    self::respond("Warning", "No such Controller");
                }
            }
        }

    }

    public static function api($endpoint, $controllerClass)
    {
        $controller = $controllerClass[0];
        $function = $controllerClass[1];

        $njia = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if ($njia === $endpoint) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                header("Access-Control-Origin: *");
                header("Content-Type: application/json");
                $data = json_decode(file_get_contents('php://input'), true);
                $action = new $controller();
                $response = $action->$function($data);
                self::response($response);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                header("Access-Control-Origin: *");
                header("Content-Type: application/json");
                $data = json_decode(file_get_contents('php://input'), true);
                $action = new $controller();
                $response = $action->$function($data);
                self::response($response);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($_GET == []) {
                    header("Access-Control-Origin: *");
                    header("Content-Type: application/json");
                    $data = $_GET;
                    // $action = new $controller();
                    // $response = $action->$function($data);
                    self::response($function);
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                header("Access-Control-Origin: *");
                header("Content-Type: application/json");
                $data = $_GET;
                $action = new $controller();
                $response = $action->$function($data);
                self::response($response);
            }
        }
    }

    public static function respond($head, $body)
    {
        if (empty($head)) {
            $head = "Warning!";
        }
        // if ($respon)

        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'. htmlspecialchars($head) .' | '. htmlspecialchars(APP_NAME) .'</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* body {
           background-Color:pink;
        } */
        .respond {
            width: 100%;
            height: 100vh;
            height: 100dvh;
            justify-content: center;
            place-items: center;
        }

        .r-container {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="respond">
        <div class="r-container">
            <h1>'. htmlspecialchars($head) .'</h1>
            <div class="response1">
                <p>'. htmlspecialchars($body) .'</p>
                <!-- -->
            </div>
        </div>
    </div>
</body>
</html>';
    }

    public static function response($response)
    {
        if (!empty($response)) {
            header("Content-Type: application/json");
            http_response_code(200);
            echo json_encode($response);
        }
    }
    
    public static function vuta($callback) {
        
        $view = "views/{$callback}.sam.php";
    
        if (file_exists($view)) {
            require $view;
        } else {
            self::respond("Warning", "No such folder or your file don't have the following extension .sam.php");
        }
    
    }

}
?>
