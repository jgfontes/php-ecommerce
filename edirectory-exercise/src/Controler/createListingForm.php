<?php


namespace Jfontes\EdirectoryExercise\Controler;


use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;

class createListingForm
{
    use HtmlRenderer;

    public function ProcessRequisite()
    {
        $html = $this->RenderHtml("registerPage.php", []);

        echo $html;
    }
}