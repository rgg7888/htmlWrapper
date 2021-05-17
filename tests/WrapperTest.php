<?php

use PHPUnit\Framework\TestCase;
use App\wrapper\Wrapper;

class Wrappertest extends TestCase {

    public function test_contenedor_1 () {

        $page_template_1 = new Wrapper();

        $this->assertEquals("<!DOCTYPE html><html lang=\"en\"><head></head><body></body></html>",$page_template_1->page());

    }

}