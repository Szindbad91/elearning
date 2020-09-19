<?php

final class RequestTest extends \PHPUnit\Framework\TestCase {
    public function testRequestClassExists() {
        $classExists = class_exists('\App\core\Request\Request');
        $this->assertTrue($classExists, '\App\core\Request\Request class does not exits');
    }

    public function testSetMethodExists() {
        $request = new App\core\Request\Request();
        $methodExists = method_exists($request, 'setMethod');
        $this->assertTrue($methodExists, 'setMethod method of Request does not exists');
    }
}