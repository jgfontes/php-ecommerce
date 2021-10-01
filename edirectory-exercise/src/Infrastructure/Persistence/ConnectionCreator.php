<?php

namespace Jfontes\EdirectoryExercise\Infrastructure\Persistence;

require __DIR__ . '/../../../vendor/autoload.php';

class ConnectionCreator {
    public static function createConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "abc123";
        $dbname = "exercise-database";

        // Create connection
        $conn = new \mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error) . PHP_EOL;
            return false;
            exit();
        }
        return $conn;
    }
}