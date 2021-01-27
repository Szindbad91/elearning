<?php


namespace App\Modules\System\User;

use App\core\Module\AbstractModule;
use App\core\Module\ContainerModuleInterface;
use App\core\Module\ModuleInterface;
use App\Modules\System\User\Controllers\NewUserController;

class Module extends AbstractModule implements ContainerModuleInterface
{
    public function register()
    {
        $this->routeResolver->registerRoute('/user/new', '\\' . NewUserController::class, 'index');
    }

    public function getContainers(): array
    {
        return [
            'test' => 'asdf'
        ];
    }
}