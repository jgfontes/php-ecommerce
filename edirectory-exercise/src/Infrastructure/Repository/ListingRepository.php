<?php

namespace Jfontes\EdirectoryExercise\Infrastructure\Repository;

require __DIR__ . '/../../../vendor/autoload.php';

use Jfontes\EdirectoryExercise\Infrastructure\Persistence\ConnectionCreator;
use Jfontes\EdirectoryExercise\Entity\Listing;

class ListingRepository{
    private \mysqli $connection;
    private CategoriesRepository $categoriesRepo;

    public function __construct(){
        $this->connection = ConnectionCreator::createConnection();
        $this->categoriesRepo = new CategoriesRepository();
    }

    //Called to create the tables
    public function initializeTables(){
        //Create listing table
        $createListingTableQuery = "CREATE TABLE IF NOT EXISTS listings (
            Id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Title VARCHAR(20),
            Address VARCHAR(50),
            City VARCHAR(20),
            State VARCHAR(20),
            Description VARCHAR(200),
            account_id INTEGER,
            FOREIGN KEY(account_id) REFERENCES accounts(id)
        )";
        $results = $this->connection->query($createListingTableQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
    }

    public function addListing($user_id, Listing $Listing){
        $insertDBQuery = "INSERT INTO listings (Title, Address, City, State, Description, account_id)
        VALUES (
            '{$Listing->title}', 
            '{$Listing->address}', 
            '{$Listing->city}', 
            '{$Listing->state}',
            '{$Listing->description}',
            '{$user_id}'
        )";
        $results = $this->connection->query($insertDBQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
        return $results;
    }

    public function getLastInsertionId()
    {
        return mysqli_insert_id($this->connection);
    }

    public function removeListing($Id) {
        //Remove categories related to the listing
        $this->categoriesRepo->removeCategory($Id);

        //Remove Query
        $deleteDBQuery = "DELETE FROM listings WHERE Id = '$Id'";
        $results = $this->connection->query($deleteDBQuery);
        if (!$results) {
            printf("User element insertion failed: %s\n", $this->connection->error);
        }
        return $results;
    }
    
    public function searchListing($searchString): array
    {
        $resultsArray = [];

        //Write query and send it to DATABASE
        $searchDBQuery = "SELECT * FROM listings WHERE Title LIKE '%$searchString%' ";
        $results = $this->connection->query($searchDBQuery);
        //Check errors
        if (!$results) {
            printf("Search element failed: %s\n", $this->connection->error);
        }
        //Fetch associative array
        while ($row = $results->fetch_assoc()) {
            $listing = $this->initializeListing($row);
            array_push($resultsArray, $listing);
        }
        return $resultsArray;
    }

    public function searchListingById($Id): Listing
    {
        //Write query and send it to DATABASE
        $searchDBQuery = "SELECT * FROM listings WHERE Id = $Id";
        $results = $this->connection->query($searchDBQuery);
        //Check errors
        if (!$results) {
            printf("Search element failed: %s\n", $this->connection->error);
        }

        //Create new Listing element and initialize it with searched Values
        $row = $results->fetch_assoc();
        return $this->initializeListing($row);
    }

    //Helper function
    private function initializeListing(array $row): Listing
    {
        $listing = new Listing(
            $row["Title"],
            $row["Address"],
            $row["City"],
            $row["State"],
            $row["Description"],
            []
        );
        $listing->setId($row["Id"]);

        //Search for the listing categories and add them to the Listing element
        $categoriesArray = $this->categoriesRepo->searchByListingId($row["Id"]);
        $listing->categories = $categoriesArray;

        return $listing;
    }
}