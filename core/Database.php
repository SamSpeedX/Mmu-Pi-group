<?php

namespace kibalanga\core; 

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port;
    private $conn;

    public function __construct() {
        $this->host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASSWORD;
        $this->port = DB_PORT;
    }

    public static function getInstance(): mixed {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect() {
        if ($this->conn === null) {
            try {
                if (DATABASE == 'mysql') {
                    $this->conn = new PDO(
                        "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name,
                        $this->username,
                        $this->password
                    );


                } elseif (DATABASE == 'sqlite') {
                    try{
                        $kibalanga = new PDO("sqlite:" . __DIR__ . "/../databases/database.sqlite");
                        $kibalanga->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        return $kibalanga;
                    } catch (PDOException $e) {
                        error_log("Database Connection Error: ". $e->getMessage());
                        die("Database connection failed.");
                    }

                } else {
                    throw new PDOException("Unsupported database type: " . DATABASE);
                }

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                error_log("Database Connection Error: " . $e->getMessage());
                die("Database connection failed.");
            }
        }
        return $this->conn;
    }

    public function mysql()
    {
        try {
            $kibalanga = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password
            );
            $kibalanga->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $kibalanga;
        } catch (PDOException $e) {
            error_log("Database Connection Error: ". $e->getMessage());
            die("Database connection failed.");
        }
    }

    public function sqlite()
    {
        try {
            $kibalanga = new PDO("sqlite:" . __DIR__ . "/../databases/database.sqlite");
            $kibalanga->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $kibalanga;
        } catch (PDOException $e) {
            error_log("Database Connection Error: ". $e->getMessage());
            die("Database connection failed.");
        }
    }
}
