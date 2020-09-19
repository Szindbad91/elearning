<?php


namespace App\core\Router\RouteResolver;


use App\core\Router\Router;
use App\core\Router\RouteResolverInterface;

class RouteResolver implements RouteResolverInterface
{
    private Router $router;
    private array $routes = [];

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function registerRoute(string $route, string $controllerClass, string $action): void
    {
        $this->routes[$route] = [
            'component' => $controllerClass,
            'action' => $action,
        ];
    }

    public function callActionByRoute(): void
    {
        $resolvedRoute = $this->getResolvedRoute();
        $component = $resolvedRoute['component'];
        $action = $resolvedRoute['action'];
        $component::$action();
    }

    public function getResolvedRoute() {
        if (!isset($this->routes[$this->router->getRouteString()])) {
            http_response_code(404);
            die();
        }
        return $this->routes[$this->router->getRouteString()];
    }
}