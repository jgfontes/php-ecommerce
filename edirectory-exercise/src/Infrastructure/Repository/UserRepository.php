<?php

namespace Jfontes\EdirectoryExercise\Infrastructure\Repository;

require __DIR__ . '/../../../vendor/autoload.php';

use Jfontes\EdirectoryExercise\Infrastructure\Persistence\ConnectionCreator;
use Jfontes\EdirectoryExercise\Entity\User;

class UserRepository{
    private \mysqli $connection;

    public function __construct(){
        $this->connection = ConnectionCreator::createConnection();
    }

    //Insert entity on database
    public function addUser(User $user){
        $insertDBQuery = "INSERT INTO accounts (Username, Password, Telephone, Email)
        VALUES (
            '{$user->getUsername()}', 
            '{$user->getPassword()}', 
            '{$user->getTelephone()}', 
            '{$user->getEmail()}'
        )";
        $results = $this->connection->query($insertDBQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }

        return $results;
    }

    public function removeUser(string $username){
        //Get User ID
        $Id = $this->getIdByName($username);

        //Remove Query
        $deleteDBQuery = "DELETE FROM accounts WHERE Id = '$Id'";
        $results = $this->connection->query($deleteDBQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
    }

    public function getIdByName($name){
        $searchDBQuery = "SELECT Id  FROM accounts WHERE Username='$name'";
        $results = $this->connection->query($searchDBQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
        $results = ($results->fetch_assoc())['Id'];
        return $results;
    }  

    public function getUserByEmail($email)
    {
        $searchDBQuery = "SELECT Id, Username, Password, Telephone, Email  FROM accounts WHERE Email='$email'";
        $results = $this->connection->query($searchDBQuery);
        if (!$results || $results->num_rows === 0) {
            return null;
        }
        $results = ($results->fetch_assoc());
        $user = new User(
            $results["Username"],
            $results["Email"],
            $results["Telephone"],
            $results["Password"]
        );
        $user->defineHashedPassword($results["Password"]);
        $user->defineId($results["Id"]);
        return $user;
    }  

}