<?php

class Connection {
    
    private function __construct() { }

    private static PDO|null $connection = null;

    /**
     * It creates a new PDO object if one doesn't already exist, and returns it
     * 
     * @return PDO|null The connection to the database.
     */
    public static function connect(): PDO|null
    {
        try {
            if (static::$connection === null) {
                static::$connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
                
                static::$connection
                    ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        return static::$connection;
    }
}