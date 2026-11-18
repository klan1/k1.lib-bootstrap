<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\tooltip;

class TooltipTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testRendersMarkup(): void
    {
        $target = new button("Hover me");
        new tooltip($target, "Tip text", tooltip::PLACEMENT_TOP);
        $html = $target->generate();
        $this->assertStringContainsString('data-bs-toggle="tooltip"', $html);
    }
}
