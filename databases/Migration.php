<?php
namespace kibalanga\databases;

use kibalanga\core\Database;
use PDOException;
use PDO;

require "core/Database.php";

class Migration
{
    public function table()
    {
        $sam = new Database();
        $sqlite = $sam->sqlite();
        $mysql = $sam->mysql();
        
        try {
        
            // Fetch all tables in the SQLite database
            $tablesQuery = $sqlite->query("SELECT name FROM sqlite WHERE type='table' AND name NOT LIKE 'sqlite_%'");
            $tables = $tablesQuery->fetchAll(PDO::FETCH_COLUMN);
        
            if (empty($tables)) {
                return "No tables found in the SQLite database.\n";
            }
        
            foreach ($tables as $table) {
                // return "Migrating table: $table...\n";
        
                // Get table structure from SQLite
                $createTableQuery = $sqlite->query("SELECT sql FROM sqlite WHERE type='table' AND name='$table'")->fetch(PDO::FETCH_COLUMN);
                if (!$createTableQuery) {
                    echo "Failed to get structure for table: $table. Skipping...\n";
                    continue;
                }
        
                // Modify the SQLite CREATE TABLE query for MySQL compatibility
                $createTableQuery = preg_replace('/"([^"]+)"/', '`$1`', $createTableQuery); // Replace double quotes with backticks
                $createTableQuery = str_replace('AUTOINCREMENT', 'AUTO_INCREMENT', $createTableQuery); // Replace AUTOINCREMENT
                $createTableQuery = str_replace('INTEGER PRIMARY KEY', 'INT PRIMARY KEY AUTO_INCREMENT', $createTableQuery); // Adjust primary key syntax
        
                // Create the table in MySQL
                $mysql->exec($createTableQuery);
                echo "Table $table created in MySQL.\n";
        
                // Fetch all data from the SQLite table
                $data = $sqlite->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
        
                if (!empty($data)) {
                    // Get column names
                    $columns = array_keys($data[0]);
                    $columnsList = implode(',', array_map(fn($col) => "`$col`", $columns));
                    $placeholders = implode(',', array_fill(0, count($columns), '?'));
        
                    // Prepare MySQL INSERT statement
                    $insertQuery = "INSERT INTO `$table` ($columnsList) VALUES ($placeholders)";
                    $stmt = $mysql->prepare($insertQuery);
        
                    // Insert data into MySQL table
                    foreach ($data as $row) {
                        $stmt->execute(array_values($row));
                    }
        
                    return "Data migrated for table: $table.\n";
                } else {
                    return "No data found for table: $table. Skipping data migration.\n";
                }
            }
        
            return "Migration completed successfully!\n";
        
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage() . "\n";
        }
    }
}
?>
