<?php


namespace App\Modules\Theme\Base;


use App\core\Module\AbstractModule;
use App\core\Template\TemplateEngineFactory;

class Module extends AbstractModule
{

    public function register()
    {
        $templateEnging = TemplateEngineFactory::create();
        $templateEnging->registerTheme(new BaseTheme());
    }
}