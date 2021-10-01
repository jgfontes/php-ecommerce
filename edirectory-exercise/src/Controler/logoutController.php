<?php


namespace Jfontes\EdirectoryExercise\Controler;


class logoutController
{
    public function ProcessRequisite(){
        session_destroy();
        header('Location: /login');
    }
}