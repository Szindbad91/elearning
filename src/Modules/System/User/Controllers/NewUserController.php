<?php

namespace App\Modules\System\User\Controllers;

class NewUserController extends \App\core\Module\Controller\AbstractController
{
    public function index() {
        $this->render('newUser.html.php');
    }
}