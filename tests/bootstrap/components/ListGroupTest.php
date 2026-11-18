<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\list_group;
use k1lib\html\div;

class ListGroupTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testNumbered(): void
    {
        $group = new list_group([['text' => 'First', 'href' => '#']], false, true);
        $this->assertStringContainsString('list-group-numbered', $group->generate());
    }

    public function testHorizontal(): void
    {
        $group = new list_group();
        $group->set_horizontal(true);
        $this->assertStringContainsString('list-group-horizontal', $group->generate());
    }

    public function testBadge(): void
    {
        $group = new list_group();
        $group->add_item('Item', '#', false, false, null, '14');
        $this->assertStringContainsString('badge bg-primary rounded-pill', $group->generate());
    }

    public function testCustomContent(): void
    {
        $group = new list_group();
        $content = new div('d-flex');
        $content->set_value('Custom');
        $group->add_item('', '#', false, false, null, null, $content);
        $this->assertStringContainsString('d-flex', $group->generate());
    }
}
