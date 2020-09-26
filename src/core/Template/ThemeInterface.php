<?php


namespace App\core\Template;


interface ThemeInterface
{
    public function setLayout(string $layoutName): void;
    public function getLayoutTemplate(): string;
}