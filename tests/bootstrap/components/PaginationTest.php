<?php

namespace k1lib\html\bootstrap\components\tests;

use PHPUnit\Framework\TestCase;
use k1lib\html\bootstrap\components\pagination;

class PaginationTest extends TestCase
{
    protected function setUp(): void
    {
        \k1lib\html\tag::set_use_log(false);
    }

    public function testCreation(): void
    {
        $pagination = new pagination(2, 5, '?page=');
        $html = $pagination->generate();
        $this->assertStringContainsString('pagination', $html);
        $this->assertStringContainsString('page-item active', $html);
    }

    public function testSizeAndAlignment(): void
    {
        $pagination = new pagination(1, 3, '');
        $pagination->set_size('lg')->set_alignment('center');
        $html = $pagination->generate();
        $this->assertStringContainsString('pagination-lg', $html);
        $this->assertStringContainsString('justify-content-center', $html);
    }
}
