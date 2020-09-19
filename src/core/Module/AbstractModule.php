<?php


namespace App\core\Module;


use App\core\Request\Request;
use App\core\Router\Router;
use App\core\Router\RouteResolverFactory;
use App\core\Router\RouteResolverInterface;

abstract class AbstractModule implements ModuleInterface
{
    protected RouteResolverInterface $routeResolver;

    public function __construct()
    {
        $this->routeResolver = RouteResolverFactory::create(new Router(Request::getInstance()));
    }

    public static function getInstance() {

    }
}