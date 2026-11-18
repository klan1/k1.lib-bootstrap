<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\close_button;

class CloseButtonTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCloseButtonCreation(): void
    {
        $button = new close_button();
        $this->assertInstanceOf(close_button::class, $button);
    }

    public function testCloseButtonHtml(): void
    {
        $button = new close_button('modal');
        $html = $button->generate();
        $this->assertStringContainsString('btn-close', $html);
        $this->assertStringContainsString('type="button"', $html);
        $this->assertStringContainsString('data-bs-dismiss="modal"', $html);
        $this->assertStringContainsString('aria-label="Close"', $html);
    }

    public function testDisabled(): void
    {
        $button = new close_button();
        $button->set_disabled(true);
        $this->assertStringContainsString('disabled', $button->generate());
    }

    public function testCloseButtonWhite(): void
    {
        $button = new close_button('alert', true);
        $this->assertStringContainsString('btn-close-white', $button->generate());
    }
}
