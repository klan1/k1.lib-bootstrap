<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\form_select;

class FormSelectTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $select = new form_select('country', 'country');
        $select->set_options(['CO' => 'Colombia', 'MX' => 'Mexico'], 'CO');
        $html = $select->generate();
        $this->assertStringContainsString('form-select', $html);
        $this->assertStringContainsString('Colombia', $html);
        $this->assertStringContainsString('selected', $html);
    }

    public function testMultiple(): void
    {
        $select = new form_select('country', 'country', null, true);
        $this->assertStringContainsString('multiple', $select->generate());
    }

    public function testSizeAndState(): void
    {
        $select = new form_select('country', 'country', 'sm');
        $select->set_state('valid')->set_disabled(true);
        $html = $select->generate();
        $this->assertStringContainsString('form-select-sm', $html);
        $this->assertStringContainsString('is-valid', $html);
        $this->assertStringContainsString('disabled', $html);
    }
}
