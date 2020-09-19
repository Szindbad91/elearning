<?php

use PHPUnit\Framework\TestCase;

final class KernelTest extends TestCase
{
    public function testKernelClassExists(): void
    {
        $classExists = class_exists('\App\Kernel');
        $this->assertTrue($classExists, 'Class \App\Kernel does not exits');
    }
}