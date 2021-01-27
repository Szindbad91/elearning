<?php

namespace App\core\Request;

class Request {
    private static self $instance;

    private string $method;
    private string $route;

    private function __construct()
    {
        $this->setRoute($_SERVER['REDIRECT_URL'] ?? '');
        $this->setMethod($_SERVER['REQUEST_METHOD'] ?? '');
    }

    public static function getInstance(): Request {
        if (!isset(self::$instance)) {
            self::$instance = new Request();
        }
        return self::$instance;
    }

    public function getMethod(): string {
        return $this->method;
    }

    private function setMethod($method): void {
        $this->method = $method;
    }

    private function setRoute($route): void {
        $this->route = $route;
    }

    public function getRoute(): string {
        return $this->route;
    }

}