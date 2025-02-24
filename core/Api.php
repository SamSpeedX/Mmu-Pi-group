<?php
namespace kibalanga\core;

use kibalanga\core\Router;

class Api
{
    protected $requestMethod;
    protected $controller;

    public function __construct($controller) {
        $this->controller = $controller;
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function Request() {
        switch ($this->requestMethod) {
            case 'GET':
                $response = $this->controller->read();
                break;

            case 'POST':
                $response = $this->controller->create();
                break;

            case 'PUT':
                $response = $this->controller->put();
                break;

            case 'DELETE':
                $response = $this->controller->delete();
                break;
            default:
                $response = 'Invalid Method';
                break;
        }
        Router::response($response);
    }
}

?>