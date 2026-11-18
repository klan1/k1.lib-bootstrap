<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\badge;

class BadgeTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testRendersMarkup(): void
    {
        $c = new badge("New"); $html = $c->generate();
        $this->assertStringContainsString('badge text-bg-primary', $html);
    }
}
