<?php

namespace Jfontes\EdirectoryExercise\Controler;

require __DIR__ . '/../../vendor/autoload.php';

use Jfontes\EdirectoryExercise\Infrastructure\Helper\flashMessage;
use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\UserRepository;

class LoginController {

    use HtmlRenderer, flashMessage;

    private UserRepository $UserRepository;

    public function __construct(){
        $this->UserRepository = new UserRepository();
    }

    public function ProcessRequisite(){
        $email = filter_input(
            INPUT_POST,
            'username',
            FILTER_VALIDATE_EMAIL
        );
        $password = filter_input(
            INPUT_POST,
            'password',
            FILTER_SANITIZE_STRING
        );

        $userRepository = new UserRepository();

        if(isset($_POST['username'])){
            $userLogin = $userRepository->getUserByEmail($email);

            //Validate email existence
            if ($userLogin) {
                //Validate password
                if ($userLogin->verifyPassword($password))
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['user_id'] = $userLogin->getId();
                    header('Location: /search');
                    $this->writeFlashMessage("Login successful", "success");
                }
                else
                {
                    header('Location: /login');
                    $this->writeFlashMessage("Password incorrect", "danger");
                }
            }
            else
            {
                header('Location: /login');
                $this->writeFlashMessage("Email doesn't exist", "danger");
            }
        }
    }
}