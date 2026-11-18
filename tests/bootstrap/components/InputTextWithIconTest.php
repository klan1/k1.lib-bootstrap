<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\input_text_with_icon;

class InputTextWithIconTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testLeftIcon(): void
    {
        $field = new input_text_with_icon('search', '', 'bi bi-search', 'left');
        $html = $field->generate();
        $this->assertStringContainsString('form-control', $html);
        $this->assertStringContainsString('form-control-icon', $html);
        $this->assertStringContainsString('bi bi-search', $html);
        $this->assertStringContainsString('padding-left: 2.25rem', $html);
        $this->assertStringContainsString('left:.75rem', $html);
    }

    public function testRightIcon(): void
    {
        $field = new input_text_with_icon('search', '', 'bi bi-search', 'right');
        $html = $field->generate();
        $this->assertStringContainsString('padding-right: 2.25rem', $html);
        $this->assertStringContainsString('right:.75rem', $html);
    }
}
