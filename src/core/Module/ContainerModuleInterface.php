<?php


namespace App\core\Module;


interface ContainerModuleInterface
{
    /**
     * This function must return with array. The index should be the key in the container and the value must be a class.
     */
    public function getContainers(): array;
}