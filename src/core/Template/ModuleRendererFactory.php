<?php


namespace App\core\Template;


class ModuleRendererFactory
{
    public static function create(string $templateName, ?object $data): Renderable {
        return new ModuleRenderer($templateName, $data);
    }
}