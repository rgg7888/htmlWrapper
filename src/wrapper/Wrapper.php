<?php

namespace App\wrapper;

use App\piezas\Piezas;

class Wrapper extends Piezas {

    public function page (array $settings = [
        'idioma' => 'en',
        'head' => [],
        'body' => [
            'contenido' => [],
            'atributos' => []
        ]
    ]) {

        $doctype = new Piezas();
        $html = new Piezas();
        $head = new Piezas();
        $body = new Piezas();

        $contenedorBasico1 = [
            'doctype' => $doctype->documento(),
            'html' => $html->html([
                'contenido' => [
                    $head->head([
                        'contenido' => $settings['head']
                    ]),
                    $body->body([
                        'contenido' => $settings['body']['contenido'],
                        'atributos' => $settings['body']['atributos']
                    ])
                ],
                'atributos' => [
                    'lang' => $settings['idioma']
                ]
            ])
        ];

        return implode("",$contenedorBasico1);

    }

}