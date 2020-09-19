<?php


namespace App\core\Router;


interface RouteResolverInterface
{
    public function __construct(Router $router);

    public function registerRoute(string $route, string $controllerClass, string $action): void;
    public function callActionByRoute(): void;
}