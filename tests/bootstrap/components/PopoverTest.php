<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\popover;

class PopoverTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $popover = new popover('Click me', popover::VARIANT_PRIMARY, 'Title', 'Body.', 'right');
        $html = $popover->generate();
        $this->assertStringContainsString('data-bs-toggle="popover"', $html);
        $this->assertStringContainsString('title="Title"', $html);
        $this->assertStringContainsString('data-bs-content="Body."', $html);
        $this->assertStringContainsString('data-bs-placement="right"', $html);
    }
}
