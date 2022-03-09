<?php

namespace App;

class Propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? 1;
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = 'Añade un título';
        }

        if(!$this->precio){
            self::$errores[] = 'Añade un precio';
        }

        if(strlen($this->descripcion) < 40){
            self::$errores[] = 'Añade una descripción de al menos 40 caracteres';
        }

        if(!$this->habitaciones){
            self::$errores[] = 'Añade Número de habitaciones';
        }

        if(!$this->wc){
            self::$errores[] = 'Añade Número de baños';
        }

        if(!$this->estacionamiento){
            self::$errores[] = 'Añade Número de estacionamientos';
        }

        if(!$this->vendedorId){
            self::$errores[] = 'Elige un vendedor';
        }

        if(!$this->imagen){
            self::$errores[] = 'La imagen es obligatoria';
        }

        return self::$errores;
    }
}

