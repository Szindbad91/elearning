<?php

namespace App\core\ComponentRegistrator\registrators;

use App\core\ComponentRegistrator\ComponentRegistratorInterface;
use App\core\Module\ModuleInterface;

class SimpleComponentRegistrator implements ComponentRegistratorInterface
{
    private string $type;

    public function __construct(string $componentType)
    {
        $this->type = ucfirst($componentType);
    }

    public function registerComponents()
    {
        $directoryToSearch = __DIR__ . '/../../../Modules/' . $this->type . '/';
        $contents = scandir($directoryToSearch);

        foreach ($contents as $content) {
            if (!in_array($content, ['.', '..']) && class_exists('App\Modules\\' . $this->type . '\\' . $content . '\Module')) {
                $moduleClass = '\App\Modules\\' . $this->type . '\\' . $content . '\Module';
                /** @var ModuleInterface $module */
                $module = new $moduleClass();
                $module->register();
            }
        }
    }
}