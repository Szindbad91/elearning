<?php

namespace App\core\Router;

use \App\core\Request\Request;

class Router
{
    private Request $request;
    private array $route;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->route = explode('/', $request->getRoute());
    }

    public function getRoute(): array {
        return $this->route;
    }

    public function getRouteString(): string {
        return $this->request->getRoute();
    }
}