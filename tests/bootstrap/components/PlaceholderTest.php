<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\placeholder;

class PlaceholderTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $placeholder = new placeholder(6, 'primary', 'sm');
        $html = $placeholder->generate();
        $this->assertStringContainsString('placeholder', $html);
        $this->assertStringContainsString('col-6', $html);
        $this->assertStringContainsString('bg-primary', $html);
        $this->assertStringContainsString('placeholder-sm', $html);
    }
}
