<?php


namespace App\core\ComponentRegistrator;


use App\core\ComponentRegistrator\registrators\SimpleComponentRegistrator;

final class ComponentRegistratorFactory
{
    public static function create($type): ComponentRegistratorInterface {
        return new SimpleComponentRegistrator($type);
    }
}