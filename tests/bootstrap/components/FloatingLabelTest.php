<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\form_control;
use k1lib\html\bootstrap\components\floating_label;

class FloatingLabelTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $input = new form_control('email', 'email', '', 'floatingInput');
        $field = new floating_label('Email address', $input);
        $html = $field->generate();
        $this->assertStringContainsString('form-floating', $html);
        $this->assertStringContainsString('placeholder="Email address"', $html);
        $this->assertStringContainsString('for="floatingInput"', $html);
    }
}
