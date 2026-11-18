<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\offcanvas;

class OffcanvasTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testRendersMarkup(): void
    {
        $c = new offcanvas(); $html = $c->generate();
        $this->assertStringContainsString('offcanvas', $html);
    }
}
