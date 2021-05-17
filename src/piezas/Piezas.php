<?php

namespace App\piezas;

use App\ha\HtmlArmor;

class Piezas extends HtmlArmor {

    public function documento () {
        $this->setType("auto");
        $this->setTag("!DOCTYPE");
        $this->setAtributos([
            '!' => "html"
        ]);
        return $this->build();
    }

    public function html (array $ca) {
        $this->setType("normal");
        $this->setTag("html");
        $this->setContenido($ca['contenido']);
        $this->setAtributos($ca['atributos']);
        return $this->build();
    }

    public function head (array $ca) {
        $this->setType("normal");
        $this->setTag("head");
        $this->setContenido($ca['contenido']);
        $this->setAtributos([]);
        return $this->build();
    }

    public function body (array $ca) {
        $this->setType("normal");
        $this->setTag("body");
        $this->setContenido($ca['contenido']);
        $this->setAtributos($ca['atributos']);
        return $this->build();
    }

}