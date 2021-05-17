<?php

use PHPUnit\Framework\TestCase;
use App\piezas\Piezas;

class Piezastest extends TestCase {

    public function test_doctype () {

        $doctype = new Piezas();

        $this->assertEquals("<!DOCTYPE html>", $doctype->documento());

    }

    public function test_html () {

        $html = new Piezas();

        $this->assertEquals("<html lang=\"en\">Html Tag</html>", $html->html([
            'contenido' => "Html Tag",
            'atributos' => [
                'lang' => 'en'
            ]
        ]));

    }

    public function test_head () {

        $head = new Piezas();

        $this->assertEquals("<head>Head Tag</head>", $head->head([
            'contenido' => "Head Tag"
        ]));

    }

    public function test_body () {

        $body = new Piezas();

        $this->assertEquals("<body class=\"wrapper\">Body Tag</body>", $body->body([
            'contenido' => "Body Tag",
            'atributos' => [
                'class' => 'wrapper'
            ]
        ]));

    }

}