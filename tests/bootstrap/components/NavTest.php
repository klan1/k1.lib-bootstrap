<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\nav;

class NavTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testRendersMarkup(): void
    {
        $c = new nav([["text" => "Home", "href" => "#"]], "tabs"); $html = $c->generate();
        $this->assertStringContainsString('nav', $html);
    }
}
