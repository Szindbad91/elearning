<?php
namespace App;

use App\core\ComponentRegistrator\ComponentRegistratorFactory;
use App\core\Request\Request;
use App\core\Router\Router;
use App\core\Router\RouteResolverFactory;
use App\core\Router\RouteResolverInterface;

class Kernel
{
    private RouteResolverInterface $routerResolver;

    private array $registrateableComponentTypes = [
        ''
    ];

    public function __construct()
    {
        $this->autoRegisterComponents();
        $this->instantiateRouterResolver();
    }

    public function run() {
        $this->routerResolver->callActionByRoute();
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
}