<?php


namespace App\core\Template;


class TemplateEngineFactory
{
    public static function create(): TemplateEngineInterface {
        return StringReplacerTemplateEnging::getInstance();
    }
}