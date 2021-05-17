<?php

namespace App\ha;

class HtmlArmor {

    //code here ...
    private array $modelo = [
        'tipo' => 'normal',
        'etiqueta' => 'main',
        'atributos' => '',
        'contenido' => ''
    ];

    public function __construct(array $ca = [
        'contenido' => 'Main Tag',
        'atributos' => [
            'class' => 'principal',
            'id' => 'contenedor'
        ]
    ]) {
        $this->setContenido($ca['contenido']);
        $this->setAtributos($ca['atributos']);
    }

    public function setType(string $tipo) {
        $this->modelo['tipo'] = $tipo;
    }

    public function getType() {
        return $this->modelo['tipo'];
    }

    public function setTag(string $etiqueta) {
        $this->modelo['etiqueta'] = $etiqueta;
    }

    public function getTag() {
        return $this->modelo['etiqueta'];
    }

    public function setAtributos(array $atributos) {
        $attr = '';
        foreach($atributos as $key => $value) {
            //para agregar espacio y palabra
            if($key === '!') {
                $attr .= ' '.$value;
            }else{
                $attr .= ' '.$key.'="'.$value.'"';
            }
        }
        $this->modelo['atributos'] = $attr;
    }

    public function getAtributos() {
        return $this->modelo['atributos'];
    }

    public function setContenido($content) {
        $this->modelo['contenido'] = is_array($content) ? implode("",$content) : $content;
    }

    public function getContenido() {
        return $this->modelo['contenido'];
    }

    public function tieneAtributos() {
        if(
            $this->getAtributos() === null ||
            $this->getAtributos() === 'null' || 
            empty($this->getAtributos())
        ) {
            return false;
        }else{
            return true;
        }
    }

    public function tieneEtiqueta() {
        if(
            $this->getTag() === null || 
            $this->getTag() === 'null' || 
            empty($this->getTag())
        ) {
            return false;
        }else{
            return true;
        }
    }

    public function tieneContenido() {
        if(
            $this->getContenido() === null || 
            $this->getContenido() === 'null' || 
            empty($this->getContenido())
        ) {
            return false;
        }else{
            return true;
        }
    }

    public function emptyTag() {
        return "<".$this->getTag().'></'.$this->getTag().'>';
    }

    public function emptyAutoTag() {
        return "<".$this->getTag().'/>';
    }

    public function contentTag() {
        return "<".$this->getTag().'>'.$this->getContenido().'</'.$this->getTag().'>';
    }

    public function attrTag() {
        return "<".$this->getTag().$this->getAtributos().'></'.$this->getTag().'>';
    }

    public function attrAutoTag() {
        if($this->getTag() === "!DOCTYPE") {
            return "<".$this->getTag().$this->getAtributos().'>';
        }else{
            return "<".$this->getTag().$this->getAtributos().'/>';
        }
    }

    public function attrContentTag() {
        return "<".$this->getTag().$this->getAtributos().'>'.$this->getContenido().'</'.$this->getTag().'>';
    }

    public function caminos_de_construccion(int $way) {

        if ($way === 1) {

            $progreso = 'etiqueta normal';
            //si no tiene atributos 
            #if($this->getAtributos() === null || $this->getAtributos() === 'null' || empty($this->getAtributos())) {
            if(!$this->tieneAtributos()) {
                #if($this->getTag() === null || $this->getTag() === 'null' || empty($this->getTag())){
                if(!$this->tieneEtiqueta()){
                    $progreso = "no se ha definido la etiqueta";
                }else{
                    #if ($this->getContenido() === null || $this->getContenido() === 'null' || empty($this->getContenido())){
                    if (!$this->tieneContenido()){
                        #$progreso = "<".$this->getTag().'></'.$this->getTag().'>';
                        $progreso = $this->emptyTag();
                    }else{
                        #$progreso = "<".$this->getTag().'>'.$this->getContenido().'</'.$this->getTag().'>';
                        $progreso = $this->contentTag();
                    }
                }
                $progreso = ($progreso === 'etiqueta normal') ? $progreso = "efectivamente es null o 'null' o vacio" : $progreso;
            }else{//si si tiene atributos
                #if ($this->getContenido() === null || $this->getContenido() === 'null' || empty($this->getContenido())){
                if (!$this->tieneContenido()){
                    #$progreso = "<".$this->getTag().$this->getAtributos().'></'.$this->getTag().'>';
                    $progreso = $this->attrTag();
                }else{
                    #$progreso = "<".$this->getTag().$this->getAtributos().'>'.$this->getContenido().'</'.$this->getTag().'>';
                    $progreso = $this->attrContentTag();
                }
            }

            return $progreso;

        }else{

            $progreso = 'selfclosing tag';

            if(!$this->tieneAtributos()) {
                if(!$this->tieneEtiqueta()){
                    $progreso = "no se ha definido la etiqueta";
                }else{
                    #$progreso = "<".$this->getTag().'/>';
                    $progreso = $this->emptyAutoTag();
                    $this->setContenido("");
                }
            }else{
                #$progreso = "<".$this->getTag().$this->getAtributos().'/>';
                $progreso = $this->attrAutoTag();
                $this->setContenido("");
            }

            return $progreso;

        }

    }

    public function etiqueta_atributos_contenido() {
        switch($this->getType()) {
            case 'auto':
                return $this->caminos_de_construccion(0);
                break;
            default:
            return $this->caminos_de_construccion(1);
            break;
        }
    }

    public function build() {
        return $this->etiqueta_atributos_contenido();
    }

}