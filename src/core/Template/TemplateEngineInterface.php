<?php

namespace App\core\Template;

interface TemplateEngineInterface
{
    public static function getInstance(): TemplateEngineInterface;
    public function registerTheme(ThemeInterface $theme): void;
    public function render(): void;
    public function setContainer(string $containerName, Renderable $renderable): void;
    public function setLayout(string $layout): void;
}