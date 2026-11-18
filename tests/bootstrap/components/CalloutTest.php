<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\callout;

class CalloutTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testRendersMarkup(): void
    {
        $c = new callout("Message"); $html = $c->generate();
        $this->assertStringContainsString('alert', $html);
    }
}
