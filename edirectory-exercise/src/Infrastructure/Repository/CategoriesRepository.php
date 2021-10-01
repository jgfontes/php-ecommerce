<?php

namespace Jfontes\EdirectoryExercise\Infrastructure\Repository;

require __DIR__ . '/../../../vendor/autoload.php';

use Jfontes\EdirectoryExercise\Infrastructure\Persistence\ConnectionCreator;

class CategoriesRepository{
    private \mysqli $connection;

    public function __construct(){
        $this->connection = ConnectionCreator::createConnection();
    }

    public function initializeTable(){
        $createCategoriesTableQuery = "CREATE TABLE IF NOT EXISTS categories (
            Id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Category VARCHAR(20),
            listing_id INTEGER,
            FOREIGN KEY(listing_id) REFERENCES listings(id)
        )";
        $results = $this->connection->query($createCategoriesTableQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
    }

    public function addCategory($category, $listing_id){
        $insertDBQuery = "INSERT INTO categories (Category, listing_id)
        VALUES (
            '{$category}', 
            '{$listing_id}'
        )";
        $results = $this->connection->query($insertDBQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
        
    }

    public function removeCategory($listingId){
        //Remove Query
        $deleteDBQuery = "DELETE FROM categories WHERE listing_id = '$listingId'";
        $results = $this->connection->query($deleteDBQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
    }

    public function searchByListingId($Id): array
    {
        $categoriesResultArray = [];
        //Write query and call DB
        $searchDBQuery = "SELECT * FROM categories WHERE listing_id = $Id";
        $results = $this->connection->query($searchDBQuery);
        //Check errors
        if (!$results) {
            printf("Search element failed: %s\n", $this->connection->error);
        }
        //Fetch associative array
        while ($row = $results->fetch_assoc()) {
            array_push($categoriesResultArray, $row["Category"]);
        }
        return $categoriesResultArray;
    }
}