<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\table_from_data;

class TableFromDataTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testVariants(): void
    {
        $table = new table_from_data();
        $table->set_data([['name' => 'Alejandro']], true);
        $table->set_bordered(true)->set_dark(true)->set_small(true);
        $html = $table->generate();
        $this->assertStringContainsString('table-bordered', $html);
        $this->assertStringContainsString('table-dark', $html);
        $this->assertStringContainsString('table-sm', $html);
    }
}
