<?php

require 'vendor/autoload.php';

use Jfontes\EdirectoryExercise\Infrastructure\Persistence\ConnectionCreator;
use Jfontes\EdirectoryExercise\Entity\User;
use Jfontes\EdirectoryExercise\Entity\Listing;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\UserRepository;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\ListingRepository;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\CategoriesRepository;

// $conn = ConnectionCreator::createConnection();

// Initialize user table
// $createDBQuery = "CREATE TABLE accounts (
//   Id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   Username VARCHAR(20),
//   Password VARCHAR(100),
//   Telephone VARCHAR(20),
//   Email VARCHAR(20)
// )";
// $result = $conn->query($createDBQuery);
// var_dump ($result);

//Delete ById
// $deleteDBQuery = "DELETE FROM accounts WHERE Id = 2";
// $results = $conn->query($deleteDBQuery);
// var_dump ($results);

// //Read all elements
// $readDBQuery = "SELECT * FROM accounts";
// $results = $conn->query($readDBQuery);
// var_dump ($results);

// Scratch -> Add User -> last id insert -> search if needed
// $randomUser = new User('Julio', 'julio123@email.com', '99989-2020', 'abc123');
// $connection = new UserRepository();
//$connection->getUserByEmail('blabla@email.com');
// $connection->addUser($randomUser);
// $connection->removeUser('Julio')
// $randomUser->verifyPassword('abc123');

//Scratch 2 -> Create Listing Repo Table
// $ListingRepo = new ListingRepository();
// $ListingRepo->initializeTables();

// Scratch 2 -> Add Listing ->
// $randomListing = new Listing(
//     'Padaria teste',
//     'Rua aleatoria 80-5',
//     'Bauru',
//     'São Paulo',
//     'padaria região cidade!!',
//     ['testeee']
// );
// var_dump($randomListing);
 $ListingRepo = new ListingRepository();
// $ListingRepo->addListing(1, $randomListing);
// var_dump($ListingRepo->getLastInsertionId());
$testVar = $ListingRepo->removeListing(15);
var_dump($testVar);

//$listing = $ListingRepo->searchListingById('2');
//var_dump($listing);

//Scratch 3 -> Create Categories Table
// $categoriesRepo = new CategoriesRepository();
// $categoriesRepo->addCategory('Viagem', 3);
//$categoriesRepo->searchByListingId("0");


?>