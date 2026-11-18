<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\range;

class RangeTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $range = new range('volume', 'volume', 0, 100, 1, 50);
        $html = $range->generate();
        $this->assertStringContainsString('form-range', $html);
        $this->assertStringContainsString('type="range"', $html);
        $this->assertStringContainsString('min="0"', $html);
        $this->assertStringContainsString('max="100"', $html);
        $this->assertStringContainsString('step="1"', $html);
    }
}
