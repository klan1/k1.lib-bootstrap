<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\form_textarea;

class FormTextareaTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $textarea = new form_textarea('comments', 'comments', 4, 'Leave a comment here');
        $html = $textarea->generate();
        $this->assertStringContainsString('form-control', $html);
        $this->assertStringContainsString('rows="4"', $html);
        $this->assertStringContainsString('placeholder="Leave a comment here"', $html);
    }

    public function testSizeAndState(): void
    {
        $textarea = new form_textarea('comments');
        $textarea->set_size('lg')->set_state('invalid');
        $html = $textarea->generate();
        $this->assertStringContainsString('form-control-lg', $html);
        $this->assertStringContainsString('is-invalid', $html);
    }
}
