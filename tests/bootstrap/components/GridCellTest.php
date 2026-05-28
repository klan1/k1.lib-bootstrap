<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\grid_cell;

class GridCellTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testGridCellCreation(): void
    {
        $cell = new grid_cell();
        $this->assertInstanceOf(grid_cell::class, $cell);
    }

    public function testSetClass(): void
    {
        $cell = new grid_cell();
        $result = $cell->set_class('my-class');
        $this->assertInstanceOf(grid_cell::class, $result);
        $this->assertEquals('my-class', $cell->get_attribute('class'));
    }

    public function testSetClassAppend(): void
    {
        $cell = new grid_cell();
        $cell->set_class('first-class');
        $cell->set_class('second-class', true);
        $this->assertStringContainsString('first-class', $cell->get_attribute('class'));
        $this->assertStringContainsString('second-class', $cell->get_attribute('class'));
    }

    public function testSetClassReplace(): void
    {
        $cell = new grid_cell();
        $cell->set_class('first-class');
        $cell->set_class('second-class', false);
        $this->assertEquals('second-class', $cell->get_attribute('class'));
    }
}
