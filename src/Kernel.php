<?php
namespace App;

use App\core\Request\Request;
use App\core\Router\Router;

class Kernel
{
    private Router $router;

    public function __construct()
    {
        $this->instantiateRouter();
    }

    public function run() {

    }

    private function instantiateRouter() {
        $this->router = new core\Router\Router(Request::getInstance());
    }
}