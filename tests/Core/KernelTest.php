<?php

namespace Tests\Core;

use Core\Kernel;
use PHPUnit\Framework\TestCase;

class KernelTest extends TestCase
{
    protected Kernel $kernel;

    protected function setUp(): void
    {
        $this->kernel = new class extends Kernel {
            public function returnThis(): static
            {
                return $this;
            }

            function routesPath(): ?string
            {
                return null;
            }
        };

        parent::setUp();
    }

    public function testInstance(): void
    {
        $this->assertInstanceOf(Kernel::class, $this->kernel::class::instance());
    }
}