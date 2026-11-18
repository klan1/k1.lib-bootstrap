<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\scrollspy;

class ScrollspyTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $scroll = new scrollspy('#nav', '250px');
        $html = $scroll->generate();
        $this->assertStringContainsString('data-bs-spy="scroll"', $html);
        $this->assertStringContainsString('data-bs-target="#nav"', $html);
        $this->assertStringContainsString('tabindex="0"', $html);
        $this->assertStringContainsString('max-height: 250px', $html);
    }
}
