<?php
namespace App;

use App\core\Request\Request;
use App\core\Router\Router;
use App\core\Router\RouteResolverFactory;
use App\core\Router\RouteResolverInterface;

class Kernel
{
    private RouteResolverInterface $routerResolver;

    public function __construct()
    {
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
}