<?php

use Jfontes\EdirectoryExercise\Controler\createListingController;
use Jfontes\EdirectoryExercise\Controler\createListingForm;
use Jfontes\EdirectoryExercise\Controler\createUserController;
use Jfontes\EdirectoryExercise\Controler\createUserForm;
use Jfontes\EdirectoryExercise\Controler\deleteListingController;
use Jfontes\EdirectoryExercise\Controler\detailListingController;
use Jfontes\EdirectoryExercise\Controler\LoginController;
use Jfontes\EdirectoryExercise\Controler\LoginFormController;
use Jfontes\EdirectoryExercise\Controler\logoutController;
use Jfontes\EdirectoryExercise\Controler\SearchListingController;
use Jfontes\EdirectoryExercise\Controler\SearchListingForm;

return [
    '/login' => LoginFormController::class,
    '/search' => SearchListingForm::class,
    '/results' => SearchListingController::class,
    '/check-login' => LoginController::class,
    '/detail' => detailListingController::class,
    '/create-listing' => createListingForm::class,
    '/create-listing-attempt' => createListingController::class,
    '/create-user' => createUserForm::class,
    '/create-user-attempt' => createUserController::class,
    '/logout' => logoutController::class,
    '/delete-listing' => deleteListingController::class,
];