<?php


namespace App\core\Module\Controller;


interface ControllerInterface
{
    public function render(string $template, object $data);
}