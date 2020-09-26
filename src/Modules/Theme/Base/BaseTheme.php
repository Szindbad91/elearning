<?php


namespace App\Modules\Theme\Base;


use App\core\Template\ModuleRendererFactory;
use App\core\Template\ThemeInterface;

class BaseTheme implements ThemeInterface
{
    protected $layoutName;

    public function setLayout(string $layoutName): void
    {
        $this->layoutName = $layoutName;
    }

    public function getLayoutTemplate(): string
    {
        $moduleRenderer = ModuleRendererFactory::create('App\Modules\Theme\Base\Template\\' . $this->layoutName . '.html.php', null);
        return $moduleRenderer->render();
    }
}