<?php
namespace App;

use App\core\ComponentRegistrator\ComponentRegistratorFactory;
use App\core\Request\Request;
use App\core\Router\Router;
use App\core\Router\RouteResolverFactory;
use App\core\Router\RouteResolverInterface;
use App\core\Template\TemplateEngineFactory;
use App\core\Template\TemplateEngineInterface;

class Kernel
{
    private RouteResolverInterface $routerResolver;
    private TemplateEngineInterface $templateEngine;

    private array $registrateableComponentTypes = [
        'System',
        'Theme',
    ];

    public function __construct()
    {
        $this->registerTemplatingEngine();
        $this->autoRegisterComponents();
        $this->instantiateRouterResolver();
    }

    public function run() {
        $this->routerResolver->callActionByRoute();
        $this->templateEngine->render();
    }

    private function instantiateRouterResolver() {
        $this->routerResolver = RouteResolverFactory::create(
            new core\Router\Router(
                Request::getInstance()
            )
        );
    }

    public function autoRegisterComponents() {
        foreach ($this->registrateableComponentTypes as $componentType) {
            $componentRegistrator = ComponentRegistratorFactory::create($componentType);
            $componentRegistrator->registerComponents();
        }
    }

    public function registerTemplatingEngine() {
        $this->templateEngine = TemplateEngineFactory::create();
    }
}