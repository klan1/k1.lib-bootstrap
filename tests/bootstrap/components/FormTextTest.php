<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\form_text;

class FormTextTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $text = new form_text('Help text', 'helpId');
        $html = $text->generate();
        $this->assertStringContainsString('form-text', $html);
        $this->assertStringContainsString('Help text', $html);
        $this->assertStringContainsString('id="helpId"', $html);
    }
}
