<?php

namespace Jfontes\EdirectoryExercise\Controler;

require __DIR__ . '/../../vendor/autoload.php';

use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\UserRepository;

class LoginFormController {

    use HtmlRenderer;

    private UserRepository $UserRepository;

    public function ProcessRequisite(){
        $html = $this->RenderHtml("form.php", []
        );
        echo $html;
    }
}