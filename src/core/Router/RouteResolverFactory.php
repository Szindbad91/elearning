<?php


namespace App\core\Router;


use App\core\Router\RouteResolver\RouteResolver;

final class RouteResolverFactory
{
    public static function create(Router $router): RouteResolverInterface {
        return new RouteResolver($router);
    }
}