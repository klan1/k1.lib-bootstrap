<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\form_check;

class FormCheckTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $check = new form_check('Default', 'check1', '', 'checkbox', 'checkDefault');
        $html = $check->generate();
        $this->assertStringContainsString('form-check', $html);
        $this->assertStringContainsString('form-check-input', $html);
        $this->assertStringContainsString('form-check-label', $html);
        $this->assertStringContainsString('type="checkbox"', $html);
    }

    public function testSwitch(): void
    {
        $check = new form_check('Switch', 'check1', '', 'checkbox', 'checkSwitch');
        $check->set_switch(true);
        $html = $check->generate();
        $this->assertStringContainsString('form-switch', $html);
        $this->assertStringContainsString('role="switch"', $html);
        $check->set_switch(false);
        $html = $check->generate();
        $this->assertStringNotContainsString('form-switch', $html);
    }

    public function testIndeterminate(): void
    {
        $check = new form_check('Indeterminate', 'check1', '', 'checkbox', 'checkIndeterminate');
        $check->set_indeterminate(true);
        $this->assertStringContainsString('indeterminate = true', $check->generate());
    }

    public function testInlineAndReverse(): void
    {
        $check = new form_check('Inline', 'check1', '', 'checkbox', 'checkInline');
        $check->set_inline(true)->set_reverse(true);
        $html = $check->generate();
        $this->assertStringContainsString('form-check-inline', $html);
        $this->assertStringContainsString('form-check-reverse', $html);
    }
}
