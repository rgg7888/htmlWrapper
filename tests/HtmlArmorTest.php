<?php

use PHPUnit\Framework\TestCase;
use App\ha\HtmlArmor;

class HtmlArmortest extends TestCase {

    //code here ...
    public function test_instancia_and_methods_of_HtmlArmor () {

        $armor = new HtmlArmor();

        $this->assertInstanceOf(HtmlArmor::class, $armor);

        $this->assertEquals("normal", $armor->getType());

        $this->assertEquals("main", $armor->getTag());

        $this->assertEquals("Main Tag", $armor->getContenido());

        $this->assertEquals(" class=\"principal\" id=\"contenedor\"", $armor->getAtributos());

        $this->assertEquals("<main class=\"principal\" id=\"contenedor\">Main Tag</main>",$armor->build());

    }

}