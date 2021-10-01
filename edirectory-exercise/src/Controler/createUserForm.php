<?php


namespace Jfontes\EdirectoryExercise\Controler;


use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;

class createUserForm
{
    use HtmlRenderer;

    public function ProcessRequisite()
    {
        $html = $this->RenderHtml("userRegisterPage.php", []);

        echo $html;
    }
}