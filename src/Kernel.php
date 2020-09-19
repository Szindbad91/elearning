<?php
namespace App;

use App\core\Request\Request;

class Kernel
{
    public function run() {
        $this->instantiateRequest();
    }

    private function instantiateRequest() {
        Request::getInstance();
    }
}