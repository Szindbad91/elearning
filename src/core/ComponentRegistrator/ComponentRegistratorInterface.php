<?php

namespace App\core\ComponentRegistrator;

interface ComponentRegistratorInterface
{
    public function __construct(string $componentType);
    public function registerComponents();
}