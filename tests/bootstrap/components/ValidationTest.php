<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\validation;

class ValidationTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testValidFeedback(): void
    {
        $feedback = new validation('Looks good!', 'valid');
        $html = $feedback->generate();
        $this->assertStringContainsString('valid-feedback', $html);
        $this->assertStringContainsString('Looks good!', $html);
    }

    public function testInvalidTooltip(): void
    {
        $feedback = new validation('Required', 'invalid', true);
        $html = $feedback->generate();
        $this->assertStringContainsString('invalid-tooltip', $html);
        $feedback->set_type('valid');
        $this->assertStringContainsString('valid-tooltip', $feedback->generate());
    }
}
