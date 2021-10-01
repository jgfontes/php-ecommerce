<?php


namespace Jfontes\EdirectoryExercise\Infrastructure\Helper;


trait HtmlRenderer
{
    public function RenderHtml(string $viewPath, array $dataArray): string
    {
        extract($dataArray);
        ob_start();
        require __DIR__ . '/../../../view/listing/' . $viewPath;
        $html = ob_get_clean();

        return $html;
    }
}