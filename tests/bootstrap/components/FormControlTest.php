<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\form_control;

class FormControlTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $input = new form_control('email', 'email', '', 'email', 'name@example.com');
        $this->assertInstanceOf(form_control::class, $input);
        $html = $input->generate();
        $this->assertStringContainsString('form-control', $html);
        $this->assertStringContainsString('type="email"', $html);
        $this->assertStringContainsString('name="email"', $html);
        $this->assertStringContainsString('placeholder="name@example.com"', $html);
    }

    public function testPlainText(): void
    {
        $input = new form_control('text', 'name', 'value');
        $input->set_plain_text(true);
        $html = $input->generate();
        $this->assertStringContainsString('class="form-control-plaintext"', $html);
        $input->set_plain_text(false);
        $this->assertStringContainsString('class="form-control"', $input->generate());
    }

    public function testSizeAndState(): void
    {
        $input = new form_control('text', 'name', '');
        $input->set_size('lg')->set_state('invalid')->set_required(true);
        $html = $input->generate();
        $this->assertStringContainsString('form-control-lg', $html);
        $this->assertStringContainsString('is-invalid', $html);
        $this->assertStringContainsString('required', $html);
    }
}
