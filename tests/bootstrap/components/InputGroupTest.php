<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\form_control;
use k1lib\html\bootstrap\components\input_group;

class InputGroupTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $group = new input_group('lg');
        $group->add_addon('@', 'before');
        $group->add_control(new form_control('text', 'username', '', NULL, 'Username'));
        $html = $group->generate();
        $this->assertStringContainsString('input-group-lg', $html);
        $this->assertStringContainsString('input-group-text', $html);
        $this->assertStringContainsString('form-control', $html);
    }
}
