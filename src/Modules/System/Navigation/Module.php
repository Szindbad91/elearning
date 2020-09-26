<?php

namespace App\Modules\System\Navigation;

use App\core\Module\AbstractModule;

class Module extends AbstractModule
{

    public function register()
    {
        $templateEngine = \App\core\Template\TemplateEngineFactory::create();
        $template = str_replace('Navigation\Module', 'Navigation\Templates\\navigation.html.php', self::class);
        $templateEngine->setContainer('navigation', new \App\core\Template\ModuleRenderer($template, null));
    }
}