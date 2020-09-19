<?php

use PHPUnit\Framework\TestCase;

final class KernelTest extends TestCase
{
    public function testKernelClassExists(): void
    {
        $classExists = class_exists('\App\Kernel');
        $this->assertTrue($classExists, 'Class \App\Kernel does not exits');
    }
    public function testRunFunctionExists(): void {
        $kernel = new \App\Kernel();
        $method_exists = method_exists($kernel, 'run');
        $this->assertTrue($method_exists, 'run method in Kernel must exits');
    }
}