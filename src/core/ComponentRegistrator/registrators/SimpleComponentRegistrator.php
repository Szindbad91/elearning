<?php

namespace App\core\ComponentRegistrator\registrators;

use App\core\ComponentRegistrator\ComponentRegistratorInterface;

class SimpleComponentRegistrator implements ComponentRegistratorInterface
{
    private string $type;

    public function __construct(string $componentType)
    {
        $this->type = ucfirst($componentType);
    }

    public function registerComponents()
    {

    }
}