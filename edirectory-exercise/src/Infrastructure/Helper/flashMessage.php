<?php


namespace Jfontes\EdirectoryExercise\Infrastructure\Helper;

trait flashMessage
{
    public function  writeFlashMessage(string $message, string $messageType): void
    {
        $_SESSION['message'] = $message;
        $_SESSION['message_type'] = $messageType;
    }
}