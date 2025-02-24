<?php

namespace Kibalanga\databases;

use kibalanga\core\Database;
use PDO;

class Migrate 
{
    public static function table()
    {
        $sam = new Database();
        $sqlite = $sam->sqlite();
        $mysql = $sam->mysql();

        try {
            // fetch all table
            $tableQuery = $sqlite->prepare("SELECT * FROM sqlite WHERE type='table'");
            $tables = $tableQuery->fetchAll(PDO::FETCH_COLUMN);

            if (empty($tables)) {
                die("No data found in SQLite database");
            }

            foreach ($tables as $table) {
                echo "migrating table: $table...\n";
            }
        }
    }
}