<?php

namespace Jfontes\EdirectoryExercise\Controler;

use Jfontes\EdirectoryExercise\Entity\User;
use Jfontes\EdirectoryExercise\Infrastructure\Helper\flashMessage;
use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\UserRepository;

class createUserController
{
    use HtmlRenderer, flashMessage;

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function ProcessRequisite()
    {
        $username = filter_input(
            INPUT_POST,
            'username',
            FILTER_SANITIZE_STRING
        );
        $password = filter_input(
            INPUT_POST,
            'password',
            FILTER_SANITIZE_STRING
        );
        $telephone = filter_input(
            INPUT_POST,
            'telephone',
            FILTER_SANITIZE_STRING
        );
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_SANITIZE_STRING
        );

        //Validate if inputs are empty
        if(empty($username) || empty($password) || empty($telephone) || empty($state) || empty($email))
        {
            $this->writeFlashMessage("Account cannot be created with empty inputs", "danger");
            header('Location: /create-user');
            exit();
        }

        //Validate if email already exist in the Database
        $searchResults = $this->userRepository->getUserByEmail($email);
        if(isset($searchResults))
        {
            $this->writeFlashMessage("Email already exist!", "danger");
            header("Location: /create-user");
            exit();
        }

        //ADD OTHER VALIDATIONS HERE

        //Create User element and add it to database
        $user = new User($username, $email, $telephone, $password);
        $results = $this->userRepository->addUser($user);
        if ($results) {
            $this->writeFlashMessage("User Successfully created!", "success");
            header("Location: /login");
        } else {
            $this->writeFlashMessage("Error in listing creation. Try again.", "danger");
            header("Location: /create-user");
        }
    }
}